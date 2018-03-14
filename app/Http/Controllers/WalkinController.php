<?php
namespace App\Http\Controllers;
use App\Expertise;
use Illuminate\Http\Request;
use Auth, Alert, DB, App\Vat;
use App\CommissionEmployeeServices;
use Illuminate\Support\Facades\Input;
use App\WalkinPayment, App\EmployeeWalkin;
use App\BillingService, App\CommissionSetting;
use App\User, App\Walkin, App\Payment, App\Service;
use App\Commission, App\ServiceType, App\ServiceWalkin;

class WalkinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $walkins = Walkin::all();

        $getAllWalkinEmployees = EmployeeWalkin::join('users as employees', 'employees.id', 'employee_walkin.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select('employee_walkin.*', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
            ->get();

        $getServices = ServiceWalkin::join('services', 'services.id', 'service_walkin.service_id')
            ->get();

        return view ('system/walk-in/index', compact('walkins', 'getAllWalkinEmployees', 'getServices'));
    }

    public function create()
    {
        $hairstylists = User::join('expertise', 'expertise.id', 'users.expertise_id')
            ->select('users.firstname as firstname', 'users.lastname as lastname', 'expertise.name as expertise',
                    'users.id as id')
            ->where('role_id', User::IS_EMPLOYEE)->get();

        $service_types = ServiceType::all();
        $services = Service::all();
        $expertise = Expertise::all();
        return view ('system/walk-in/create', compact('hairstylists', 'service_types', 'services', 'expertise'));
    }

    public function store(Request $request)
    {

        $current_day = date('Y-m-d');

        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'contact_no' => 'required',
            'email' => 'required|email', 'employee_id' => 'required', 'walkin_time' => 'required',
            'service_id' => 'required'
        ]);

        /*$checkExistingWalkin = Walkin::where('user_id', $request->user_id) //employee_id
            ->where('walkin_time', $request->walkin_time)
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), '=', $current_day)
            ->where('status', 'Pending')->first();
            
        if($checkExistingWalkin) {
            Alert::error('Walk-in has conflict!')->persistent("OK");
            return redirect()->back()->withInput(Input::all());
        }*/

        $createCustomerWalkin = Walkin::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'walkin_time' => $request->walkin_time,
            'status' => 'Pending'
        ]);

        //Insert multiple hairstylist and walkin id to pivot
        $i = 0; 
        foreach($request->employee_id as $key => $v){
            $createEmployeeWalkin = EmployeeWalkin::create([
                'employee_id' => $request->employee_id[$i],
                'walkin_id' => $createCustomerWalkin->id
            ]);
            $i++;
        }

        $i = 0; 
        foreach($request->service_id as $key => $v){
            $createServiceWalkin = ServiceWalkin::create([
                'service_id' => $request->service_id[$i],
                'walkin_id' => $createCustomerWalkin->id
            ]);
            $i++;
        }

        Alert::success('Walk-in has been Added!')->persistent("OK");
        return redirect()->route('walk-in.index');

    }

    public function walkinPay($walkin_id) {

        if($walkin_id == null || count($walkin_id) == 0) {
            return redirect()->route('walk-in.index');
        }

        $getTotalAmountDue = ServiceWalkin::join('services', 'services.id', 'service_walkin.service_id')
            ->join('walkin', 'walkin.id', 'service_walkin.walkin_id')
            ->select('services.name as service_name', 'services.price as service_price',
                'walkin.firstname as firstname', 'walkin.lastname as lastname',
                'service_walkin.walkin_id as walkin_id', DB::raw('SUM(services.price) as total'))
            ->where('service_walkin.walkin_id', $walkin_id)
            ->get();

        $getCustomerDetails = Walkin::where('id', $walkin_id)->first();

        //display list of availed walkin services
        $getAllWalkinServices = ServiceWalkin::join('services', 'services.id', 'service_walkin.service_id')
            ->join('walkin', 'walkin.id', 'service_walkin.walkin_id')
            ->select('services.name as service_name', 'services.price', 'service_walkin.created_at')
            ->where('service_walkin.walkin_id', $walkin_id)
            ->get();

        //get default Vat
        $vat = Vat::first();

        $getAllEmployeeWalkin = EmployeeWalkin::join('users as employees', 'employees.id', 'employee_walkin.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select('employee_walkin.*', 'employees.lastname', 'employees.firstname', 'expertise.name as expertise')
            ->where('employee_walkin.walkin_id', $walkin_id)
            ->get();

        $sumEmployeeWalkinServiceFee = EmployeeWalkin::join('users as employees', 'employees.id', 'employee_walkin.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select(DB::raw('SUM(expertise.service_fee) as totalServiceFee'))
            ->where('employee_walkin.walkin_id', $walkin_id)
            ->first();

        return view('system/payment/adminPayWalkin', compact('getTotalAmountDue', 'getAllWalkinServices', 
            'vat', 'getCustomerDetails', 'getAllEmployeeWalkin', 'sumEmployeeWalkinServiceFee', 'walkin_id'));
    }

    public function walkinPayStore(Request $request) {

        $this->validate($request, [
            'amount_paid' => 'required'
        ]);

        //VALIDATE PAYMENT
        if($request->amount_paid < $request->totalAmountDue) { //if amount paid < total amount due
            Alert::error('Invalid Amount! Please pay the total amount due.')->persistent("OK");
            return redirect()->back()->withInput(Input::all());
        }

        //IF AMOUNT PAID IS LESSER THAN TOTAL AMOUNT TO BE PAID (MAY SUKLI)
        if($request->amount_paid >= $request->totalAmountDue) {
            $change = ($request->amount_paid - $request->totalAmountDue);
        }

        $updateWalkinStatus = Walkin::where('id', $request->walkin_id)->first();
        $updateWalkinStatus->status = 'Paid';
        $updateWalkinStatus->save();

        //INSERT PAYMENT
        $addWalkinPayment = WalkinPayment::create([
            'customer_firstname' => $request->customer_firstname,
            'customer_lastname' => $request->customer_lastname,
            'total_amount' => $request->totalAmountDue,
            'amount_paid' => $request->amount_paid,
            'change' => $change
        ]);

        //INSERT HAIRSTYLIST/EMPLOYEE COMMISSION
        $getDefaultCommissionPercentage = CommissionSetting::first();
        $percentage = $getDefaultCommissionPercentage->percentage;

        //Convert our percentage value into a decimal.
        $percentageInDecimal = $percentage / 100;
        $totalEmployeeCommission = $percentageInDecimal * $request->amount_paid;

        /*$insertEmployeeCommission = Commission::create([
            'employee_id' => $request->employee_id,
            'commission' => $totalEmployeeCommission
        ]);*/

        //display list of availed walkin services
        $getAllWalkinServices = ServiceWalkin::join('services', 'services.id', 'service_walkin.service_id')
            ->join('walkin', 'walkin.id', 'service_walkin.walkin_id')
            ->select('services.id as service_id', 'services.name as service_name', 'services.price as price', 'service_walkin.created_at')
            ->where('service_walkin.walkin_id', $request->walkin_id)
            ->get();

        /*$employee_id1 = $request->employee_id; // for commissions pivot*/
        /*$commission_id = $insertEmployeeCommission->id; // for commissions pivot

        foreach($getAllWalkinServices as $getAllWalkinService){
            $service_id[] = $getAllWalkinService->service_id;
        }

        for($i=0;$i<count($service_id);$i++){
            CommissionEmployeeServices::create([
                'commission_id' => $commission_id, 
                'employee_id' => $employee_id1, 
                'service_id' => $service_id[$i]
            ]);
        }*/

        //IF AMOUNT PAID IS LESSER THAN TOTAL AMOUNT TO BE PAID (MAY SUKLI)
        if($request->amount_paid >= $request->totalAmountDue) {
            $change = ($request->amount_paid - $request->totalAmountDue);
            Alert::success('Payment Successful! <br> Total Amount:&#8369;'.$request->totalAmountDue.'<br> Amount Paid:&#8369;'.$request->amount_paid.'<br>Change:&#8369;'.$change.'')->html()->persistent("OK");

            return redirect()->route('viewWalkinReceipt', ['walkin_id' => $request->walkin_id, 'amount_paid' => $request->amount_paid, 'change' => $change]);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id) //walkin_id
    {
        $walkin = Walkin::where('walkin.id', $id)->first();
        $employee_walkin_pivot = EmployeeWalkin::where('walkin_id', $walkin->id)->pluck('employee_id')->toArray();

        $getAllWalkinEmployees = EmployeeWalkin::join('users as employees', 'employees.id', 'employee_walkin.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select('employee_walkin.*', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
            ->where('employee_walkin.walkin_id', $id)
            ->get();

        $hairstylists = User::join('expertise', 'expertise.id', 'users.expertise_id')
            ->select('users.firstname', 'users.lastname', 'users.id', 'expertise.name as expertise')
            ->where('role_id', User::IS_EMPLOYEE)->get();

        $services = Service::all();
        return view ('system/walk-in/edit', compact('walkin', 'hairstylists', 'services', 'getAllWalkinEmployees', 
            'employee_walkin_pivot'));
    }

    public function update(Request $request, $id)
    {
 
        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'contact_no' => 'required',
            'email' => 'required|email', 'employee_id' => 'required', 'walkin_time' => 'required',
            'service_id' => 'required'
        ]);

        $time1 = strtotime($request->walkin_start_time);
        $walkin_end_time = date("H:i:s", strtotime('+30 minutes', $time1));

        $walkin = Walkin::find($id);
        $walkin->firstname = $request->firstname;
        $walkin->lastname = $request->lastname;
        $walkin->contact_no = $request->contact_no;
        $walkin->email = $request->email;
        $walkin->walkin_time = $request->walkin_time;
        $walkin->save();

        //employee walkin pivot
        $employee_walkin = EmployeeWalkin::where('walkin_id', $id)->exists();

        if($employee_walkin) {
            $delete = EmployeeWalkin::where('walkin_id', $id)->delete();

            $i = 0; 
            foreach($request->employee_id as $key => $v){
                EmployeeWalkin::Create([
                    'employee_id' => $request->employee_id[$i],
                    'walkin_id' => $id
                ]);
                $i++;
            }
        } else {
            $i = 0; 
            foreach($request->employee_id as $key => $v){
                EmployeeWalkin::Create([
                    'employee_id' => $request->employee_id[$i],
                    'walkin_id' => $id
                ]);
                $i++;
            }
        }

        $check_existing = ServiceWalkin::where('walkin_id', $id)->exists();

        if($check_existing) {
            $delete = ServiceWalkin::where('walkin_id', $id)->delete();

            $i = 0; 
            foreach($request->service_id as $key => $v){
                ServiceWalkin::Create([
                    'service_id' => $request->service_id[$i],
                    'walkin_id' => $id
                ]);
                $i++;
            }
        } else {
            $i = 0; 
            foreach($request->service_id as $key => $v){
                ServiceWalkin::Create([
                    'service_id' => $request->service_id[$i],
                    'walkin_id' => $id
                ]);
                $i++;
            }
        }

        Alert::success('Walk-in has been Updated!')->autoclose(1000);
        return redirect()->route('walk-in.index');

    }

    public function destroy($id)
    {
        $walkin = Walkin::findOrFail($id)->delete();
        $deletePivotServiceWalkin = ServiceWalkin::where('walkin_id', $id)->delete();
        $deletePivotEmployeeWalkin = EmployeeWalkin::where('walkin_id', $id)->delete();

        Alert::success('Walk-in has been deleted!')->autoclose(1000);
        return redirect()->route('walk-in.index');
    }
}
