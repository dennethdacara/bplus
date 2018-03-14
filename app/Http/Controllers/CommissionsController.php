<?php
namespace App\Http\Controllers;
use App\Commission, App\CommissionSetting;
use Auth, DB, Alert, App\User;
use Illuminate\Http\Request;
use App\CommissionEmployee, App\CommissionService;

class CommissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAllCommissions() {
        $employeeCommissions = Commission::join('commission_employee', 'commission_employee.commission_id', 'commissions.id')
        ->join('users as employees', 'employees.id', 'commission_employee.employee_id')
        ->join('expertise', 'expertise.id', 'employees.expertise_id')
        ->select('commission_employee.id as commission_employee_id', 'commissions.id', 'commissions.commission', 'commissions.created_at', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise', 'expertise.service_fee')
        ->get();

        //services done by hairstylist/employee that went to commissions
        $getAllServices = CommissionService::join('services', 'services.id', 'commission_service.service_id')
            ->join('commission_employee', 'commission_employee.commission_id', 'commission_service.commission_id')
            ->select('services.name as service_name', 'services.price', 
                'commission_employee.employee_id as employee_id', 'commission_service.commission_id')
            ->groupBy('commission_service.id')
            ->get();

            /*$getTotalAmountServices = Commission::join('commission_service', 'commission_service.commission_id', 'commissions.id')
                ->join('commission_employee', 'commission_employee.commission_id', 'commissions.id')
                ->join('services', 'services.id', 'commission_service.service_id')
                ->select('services.name as service_name', 'services.price', 'commission_employee.employee_id as employee_id', 'commission_service.commission_id', DB::raw('SUM(services.price) as total'))
                ->groupBy('commissions.id', 'services.id')
                ->distinct()
                ->get();

        return $getTotalAmountServices;*/

        $getDefaultCommissionPercentage = CommissionSetting::first();
        $percentage = $getDefaultCommissionPercentage->percentage;

        return view ('system/commissions/viewAllCommissions', 
            compact('employeeCommissions', 'getAllServices', 'percentage'));
    }

    public function editCommissionSettings()
    {
    	$currentCommissionSettings = CommissionSetting::first();

        return view ('system/commissions/commissionSettings', 
        	compact('currentCommissionSettings'));
    }

    public function updateCommissionSettings(Request $request)
    {
        $this->validate($request, [
        	'percentage' => 'required'
        ]);

        $CommissionSettings = CommissionSetting::first();
        $CommissionSettings->percentage = $request->percentage;
        $CommissionSettings->save();

        Alert::success('Commission Settings Updated!')->autoclose(1000);
        return redirect()->back();
    }

}
