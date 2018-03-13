<?php
namespace App\Http\Controllers;
use App\Vat;
use App\User;
use App\Walkin;
use Alert, DB, Auth;
use App\ServiceWalkin;
use App\BillingService;
use App\EmployeeWalkin;
use App\BillingEmployee;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function viewWalkinReceipt($walkin_id, $amount_paid, $change) {

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

    	return view ('system/receipt/walkin/viewReceipt',
    		compact('getTotalAmountDue', 'getCustomerDetails', 'getAllWalkinServices', 'getAllEmployeeWalkin',
    				'sumEmployeeWalkinServiceFee', 'vat', 'amount_paid', 'change'));
    }

    public function viewReservationReceipt($billing_id, $amount_paid, $change) {

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

    	return view ('system/receipt/reservation/viewReceipt', compact('getTotalAmountDue', 'getAllServices', 'vat', 'BillingEmployees', 'sumBillingEmployeeServiceFee', 'amount_paid', 'change'));
    }
}
