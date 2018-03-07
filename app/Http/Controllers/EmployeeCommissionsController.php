<?php
namespace App\Http\Controllers;
use App\User;
use App\Commission;
use Auth, DB, Alert;
use App\CommissionSetting;
use Illuminate\Http\Request;
use App\CommissionEmployeeServices;

class EmployeeCommissionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewAllCommissions() {
        $myCommissions = Commission::join('users as employees', 'employees.id', 'commissions.employee_id')
        ->join('expertise', 'expertise.id', 'employees.expertise_id')
        ->select('commissions.id', 'commissions.commission', 'commissions.created_at', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise', 'expertise.service_fee')
        ->where('employees.id', Auth::user()->id)
        ->get();

        //services done by hairstylist/employee that went to commissions
        $getAllServices = CommissionEmployeeServices::join('services', 'services.id', 'commission_employee_services.service_id')
            ->select('services.name as service_name', 'services.price', 
                'commission_employee_services.employee_id as employee_id', 'commission_employee_services.commission_id')
            ->where('commission_employee_services.employee_id', Auth::user()->id)
            ->get();

        $getTotalAmountServices = CommissionEmployeeServices::join('services', 'services.id', 'commission_employee_services.service_id')
            ->select('services.name as service_name', 'services.price', 'commission_employee_services.employee_id as employee_id', 'commission_employee_services.commission_id',
                DB::raw('SUM(services.price) as total'))
            ->where('commission_employee_services.employee_id', Auth::user()->id)
            ->groupBy('commission_employee_services.commission_id')
            ->get();

        $getDefaultCommissionPercentage = CommissionSetting::first();
        $percentage = $getDefaultCommissionPercentage->percentage;

        return view ('employees/commissions/viewAllCommissions', 
            compact('myCommissions', 'getAllServices', 'getTotalAmountServices', 'percentage'));
    }
}
