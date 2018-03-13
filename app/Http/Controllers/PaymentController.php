<?php
namespace App\Http\Controllers;
use App\Vat;
use Auth, DB, Alert;
use App\WalkinPayment;
use App\BillingEmployee;
use App\EmployeeReservation;
use Illuminate\Http\Request;
use App\CommissionEmployeeServices;
use Illuminate\Support\Facades\Input;
use App\Commission, App\BillingService;
use App\User, App\Billing, App\Payment, App\CommissionSetting;

class PaymentController extends Controller
{
	public function adminViewAllPayments() {
		$payments = Payment::join('users as customers', 'customers.id', 'payments.customer_id')
			->select('payments.total_amount', 'payments.amount_paid', 'payments.change',
					'customers.firstname as customer_firstname', 'customers.lastname as customer_lastname',
					'payments.created_at', 'payments.id')
			->get();

        $walkinPayments = WalkinPayment::all();
		return view ('system/payment/adminViewAllPayments', compact('payments', 'walkinPayments'));
	}

    public function adminPayBilling($billing_id) {

    	$getTotalAmountDue = BillingService::select(DB::raw('SUM(billing_service.amount) as total'))
    		->where('billing_id', $billing_id)->first();

    	$getAllServices = BillingService::join('services', 'services.id', 'billing_service.service_id')
    		->join('billing', 'billing.id', 'billing_service.billing_id')
    		->join('users as customers', 'customers.id', 'billing.customer_id')
    		->select('services.name as service_name', 'services.price', 'billing.id as billing_id',
    				'billing_service.created_at as created_at', 'customers.id as customer_id', 'services.id as id', 
                    'customers.firstname as customer_firstname', 'customers.lastname as customer_lastname')
    		->where('billing_service.billing_id', $billing_id)
    		->get();

        $vat = Vat::first();

        $BillingEmployees = BillingEmployee::join('users as employees', 'employees.id', 'billing_employee.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select('billing_employee.*', 'employees.lastname', 'employees.firstname', 'expertise.name as expertise')
            ->where('billing_employee.billing_id', $billing_id)
            ->get();

        $sumBillingEmployeeServiceFee = BillingEmployee::join('users as employees', 'employees.id', 'billing_employee.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select(DB::raw('SUM(expertise.service_fee) as totalServiceFee'))
            ->where('billing_employee.billing_id', $billing_id)
            ->first();

    	return view ('system/payment/adminPayBilling', 
    		compact('getTotalAmountDue', 'getAllServices', 'vat', 'BillingEmployees', 'sumBillingEmployeeServiceFee'));
    }

    public function adminPayBillingStore(Request $request) {

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

    	//INSERT PAYMENT
    	$addPayment = Payment::create([
    		'customer_id' => $request->customer_id,
    		'total_amount' => $request->totalAmountDue,
    		'amount_paid' => $request->amount_paid,
            'change' => $change
    	]);

    	//UPDATE BILLING STATUS TO PAID
    	$updateBillingStatus = Billing::find($request->billing_id);
    	$updateBillingStatus->status = 'Paid';
    	$updateBillingStatus->save();

        //INSERT HAIRSTYLIST/EMPLOYEE COMMISSION
        $getDefaultCommissionPercentage = CommissionSetting::first();
        $percentage = $getDefaultCommissionPercentage->percentage;

        //Convert our percentage value into a decimal.
        $percentageInDecimal = $percentage / 100;
        $totalEmployeeCommission = $percentageInDecimal * $request->amount_paid;

        /*$insertEmployeeCommission = Commission::create([
            'employee_id' => $request->employee_id,
            'commission' => $totalEmployeeCommission
        ]);

        $getAllServices = BillingService::join('services', 'services.id', 'billing_service.service_id')
            ->join('billing', 'billing.id', 'billing_service.billing_id')
            ->join('users as employees', 'employees.id', 'billing.employee_id')
            ->join('expertise', 'employees.expertise_id', 'expertise.id')
            ->join('users as customers', 'customers.id', 'billing.customer_id')
            ->select('services.id as service_id', 'services.name as service_name', 
                    'services.price as price', 'billing.id as billing_id')
            ->where('billing_service.billing_id', $request->billing_id)
            ->get();

        $employee_id1 = $request->employee_id; // for commissions pivot
        $commission_id = $insertEmployeeCommission->id; // for commissions pivot

        foreach($getAllServices as $getAllServices1){
            $service_id[] = $getAllServices1->service_id;
        }

        for($i=0;$i<count($service_id);$i++){
            CommissionEmployeeServices::create([
                'commission_id' => $commission_id, 
                'employee_id' => $employee_id1, 
                'service_id' => $service_id[$i]
            ]);
        }*/

        Alert::success('Payment Successful! <br> Total Amount:&#8369;'.$request->totalAmountDue.'<br> Amount Paid:&#8369;'.$request->amount_paid.'<br>Change:&#8369;'.$change.'')->html()->persistent("OK");

            return redirect()->route('viewReservationReceipt', ['billing_id' => $request->billing_id, 'amount_paid' => $request->amount_paid, 'change' => $change]);

    }
}
