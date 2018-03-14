<?php
namespace App\Http\Controllers;
use Auth, DB, Alert, App\User;
use App\CommissionSetting, App\Commission;
use Illuminate\Http\Request;
use App\CommissionEmployee, App\CommissionService;

class EmployeeCommissionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewAllCommissions() {
        $myCommissions = Commission::join('commission_employee', 'commission_employee.commission_id', 'commissions.id')
        ->join('users as employees', 'employees.id', 'commission_employee.employee_id')
        ->join('expertise', 'expertise.id', 'employees.expertise_id')
        ->select('commissions.id', 'commissions.commission', 'commissions.created_at', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise', 'expertise.service_fee')
        ->where('employees.id', Auth::user()->id)
        ->get();

        //services done by hairstylist/employee that went to commissions
        $getAllServices = CommissionService::join('services', 'services.id', 'commission_service.service_id')
            ->join('commission_employee', 'commission_employee.commission_id', 'commission_service.commission_id')
            ->select('services.name as service_name', 'services.price', 
                'commission_employee.employee_id as employee_id', 'commission_service.commission_id')
            ->where('commission_employee.employee_id', Auth::user()->id)
            ->get();

        /*$getTotalAmountServices = CommissionEmployeeServices::join('services', 'services.id', 'commission_employee_services.service_id')
            ->select('services.name as service_name', 'services.price', 'commission_employee_services.employee_id as employee_id', 'commission_employee_services.commission_id',
                DB::raw('SUM(services.price) as total'))
            ->where('commission_employee_services.employee_id', Auth::user()->id)
            ->groupBy('commission_employee_services.commission_id')
            ->get();*/

        $getDefaultCommissionPercentage = CommissionSetting::first();
        $percentage = $getDefaultCommissionPercentage->percentage;

        return view ('employees/commissions/viewAllCommissions', 
            compact('myCommissions', 'getAllServices', 'percentage'));
    }
}
