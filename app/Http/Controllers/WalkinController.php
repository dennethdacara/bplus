<?php

namespace App\Http\Controllers;
use App\User;
use App\Walkin;
use App\Payment;
use App\Service;
use App\Commission;
use App\ServiceType;
use Auth, Alert, DB;
use App\ServiceWalkin;
use App\BillingService;
use App\CommissionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WalkinController extends Controller
{

    public function index()
    {
        $walkins = Walkin::join('users', 'users.id', 'walkin.user_id')
            ->select('walkin.*', 'users.firstname as hairstylist')
            ->orderBy('walkin.created_at', 'desc')->paginate(8);

        $getServices = ServiceWalkin::join('services', 'services.id', 'service_walkin.service_id')
            ->get();

        return view ('system/walk-in/index', compact('walkins', 'getServices'));
    }

    public function create()
    {
        $hairstylists = User::where('role_id', User::IS_EMPLOYEE)->get();
        $service_types = ServiceType::all();
        $services = Service::all();
        return view ('system/walk-in/create', compact('hairstylists', 'service_types', 'services'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $current_day = date('Y-m-d');

        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'contact_no' => 'required',
            'email' => 'required|email', 'user_id' => 'required', 'walkin_time' => 'required',
            'service_id' => 'required'
        ]);

        $checkExistingWalkin = Walkin::where('user_id', $request->user_id) //employee_id
            ->where('walkin_time', $request->walkin_time)
            ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), '=', $current_day)
            ->first();

        if($checkExistingWalkin) {
            Alert::error('Walk-in has conflict!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $createCustomerWalkin = Walkin::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'walkin_time' => $request->walkin_time,
            'status' => 'Pending'
        ]);

        $i = 0; 
        foreach($request->service_id as $key => $v){
            $createServiceWalkin = ServiceWalkin::create([
                'service_id' => $request->service_id[$i],
                'walkin_id' => $createCustomerWalkin->id
            ]);
            $i++;
        }

        Alert::success('Walk-in has been Added!')->autoclose(1000);
        return redirect()->route('walk-in.index');

    }

    public function walkinPay($walkin_id) {

        if($walkin_id == null || count($walkin_id) == 0) {
            return redirect()->route('walk-in.index');
        }

        $getTotalAmountDue = ServiceWalkin::join('services', 'services.id', 'service_walkin.service_id')
            ->join('walkin', 'walkin.id', 'service_walkin.walkin_id')
            ->select('services.name as service_name', 'services.price as service_price',
                'walkin.firstname as firstname', 'walkin.lastname as lastname', 'walkin.user_id as employee_id',
                'service_walkin.walkin_id as walkin_id', DB::raw('SUM(services.price) as total'))
            ->where('service_walkin.walkin_id', $walkin_id)
            ->groupBy('service_walkin.walkin_id')
            ->get();

        return view('system/payment/adminPayWalkin', compact('getTotalAmountDue'));
    }

    public function walkinPayStore(Request $request) {
        $this->validate($request, [
            'amount_paid' => 'required'
        ]);

        //IF NOT EXACT AMOUNT
        if($request->amount_paid != $request->totalAmountDue) {
            Alert::error('Please enter exact amount!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $updateWalkinStatus = Walkin::where('id', $request->walkin_id)->first();

        $updateWalkinStatus->status = 'Paid';
        $updateWalkinStatus->save();

        //INSERT PAYMENT
        /*$addPayment = Payment::create([
            'customer_id' => 0,
            'total_amount' => $request->totalAmountDue,
            'amount_paid' => $request->amount_paid
        ]);*/

        //INSERT HAIRSTYLIST/EMPLOYEE COMMISSION
        $getDefaultCommissionPercentage = CommissionSetting::first();
        $percentage = $getDefaultCommissionPercentage->percentage;

        //Convert our percentage value into a decimal.
        $percentageInDecimal = $percentage / 100;
        $totalEmployeeCommission = $percentageInDecimal * $request->amount_paid;

        $insertEmployeeCommission = Commission::create([
            'employee_id' => $request->employee_id,
            'commission' => $totalEmployeeCommission
        ]);

        Alert::success('Walk-in Paid!')->autoclose(1000);
        return redirect()->route('walk-in.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $walkin = Walkin::join('users', 'users.id', 'walkin.user_id')
            ->select('walkin.*', 'users.firstname as hairstylist')
            ->where('walkin.id', $id)
            ->first();

        $hairstylists = User::where('role_id', User::IS_EMPLOYEE)->get();
        $services = Service::all();
        return view ('system/walk-in/edit', compact('walkin', 'hairstylists', 'services', 'serviceWalkinPivot'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'contact_no' => 'required',
            'email' => 'required|email', 'user_id' => 'required', 'walkin_time' => 'required',
            'service_id' => 'required'
        ]);

        $time1 = strtotime($request->walkin_start_time);
        $walkin_end_time = date("H:i:s", strtotime('+30 minutes', $time1));

        $walkin = Walkin::find($id);
        $walkin->firstname = $request->firstname;
        $walkin->lastname = $request->lastname;
        $walkin->contact_no = $request->contact_no;
        $walkin->email = $request->email;
        $walkin->user_id = $request->user_id;
        $walkin->walkin_time = $request->walkin_time;
        $walkin->save();

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

        Alert::success('Walk-in has been deleted!')->autoclose(1000);
        return redirect()->route('walk-in.index');
    }
}
