<?php
namespace App\Http\Controllers;
use App\User;
use App\Billing;
use App\Payment;
use App\Commission;
use Auth, DB, Alert;
use App\BillingService;
use App\CommissionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
	public function adminViewAllPayments() {
		$payments = Payment::join('users as customers', 'customers.id', 'payments.customer_id')
			->select('payments.total_amount as total_amount', 'payments.amount_paid as amount_paid',
					'customers.firstname as customer_firstname', 'customers.lastname as customer_lastname',
					'payments.created_at as created_at', 'payments.id as id')
			->get();

		return view ('system/payment/adminViewAllPayments', compact('payments'));
	}

    public function adminPayBilling($billing_id) {

    	$getTotalAmountDue = BillingService::select(DB::raw('SUM(billing_service.amount) as total'))
    		->where('billing_id', $billing_id)->first();

    	$getAllServices = BillingService::join('services', 'services.id', 'billing_service.service_id')
    		->join('billing', 'billing.id', 'billing_service.billing_id')
    		->join('users as employees', 'employees.id', 'billing.employee_id')
            ->join('expertise', 'employees.expertise_id', 'expertise.id')
    		->join('users as customers', 'customers.id', 'billing.customer_id')
    		->select('services.name as service_name', 'services.price as price', 'billing.id as billing_id',
    				'billing_service.created_at as created_at', 'employees.id as employee_id',
    				'employees.firstname as hairstylist_firstname', 'employees.lastname as hairstylist_lastname',
    				'customers.id as customer_id', 'services.id as id', 'customers.firstname as customer_firstname', 'customers.lastname as customer_lastname', 'expertise.service_fee as service_fee',
                    'expertise.name as expertise')
    		->where('billing_service.billing_id', $billing_id)
    		->get();

    	return view ('system/payment/adminPayBilling', 
    		compact('getTotalAmountDue', 'getAllServices'));
    }

    public function adminPayBillingStore(Request $request) {

    	$this->validate($request, [
    		'amount_paid' => 'required'
    	]);

    	//IF NOT EXACT AMOUNT
    	if($request->amount_paid != $request->totalAmountDue) {
    		Alert::error('Please enter exact amount!')->autoclose(1000);
    		return redirect()->back()->withInput(Input::all());
    	}

    	//INSERT PAYMENT
    	$addPayment = Payment::create([
    		'customer_id' => $request->customer_id,
    		'total_amount' => $request->totalAmountDue,
    		'amount_paid' => $request->amount_paid
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

        $insertEmployeeCommission = Commission::create([
            'employee_id' => $request->employee_id,
            'commission' => $totalEmployeeCommission
        ]);

    	Alert::success('Payment Successful!')->autoclose(1000);
    	return redirect()->route('adminViewBilling');

    }
}
