<?php
namespace App\Http\Controllers;
use App\User;
use App\Billing;
use Auth, DB, Alert;
use App\BillingService;
use App\BillingEmployee;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adminViewBilling() {

    	$billings = Billing::join('users', 'users.id', 'billing.customer_id')
            ->join('reservations', 'reservations.id', 'billing.reservation_id')
    		->join('users as cashiers', 'cashiers.id', 'billing.cashier_id')
    		->select('users.firstname as customer_firstname', 'users.lastname as customer_lastname', 'cashiers.firstname as cashier_firstname', 'cashiers.lastname as cashier_lastname', 'billing.id as id', 'billing.status as status', 'billing.created_at as created_at', 'reservations.reservation_date', 'reservations.reservation_time', 'reservations.created_at')
    		->get();

    	$getServices = BillingService::join('services', 'services.id', 'billing_service.service_id')
    		->select('services.name as service_name', 'services.price as service_price', 'billing_service.billing_id as billing_id')
            ->get();

        $getServiceTotal = BillingService::join('services', 'services.id', 'billing_service.service_id')
    		->select('services.name as service_name', 'services.price as service_price', 'billing_service.billing_id as billing_id', DB::raw('SUM(billing_service.amount) as total'))
    		->groupBy('billing_service.billing_id')
            ->get();

        $billingEmployees = BillingEmployee::join('users as employees', 'employees.id', 'billing_employee.employee_id')
            ->join('expertise', 'expertise.id', 'employees.expertise_id')
            ->select('billing_employee.*', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
            ->get();

    	return view ('system/billing/adminViewBilling', 
    		compact('billings', 'getServices', 'getServiceTotal', 'billingEmployees'));
    }
}
