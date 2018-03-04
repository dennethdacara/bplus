<?php
namespace App\Http\Controllers;
use App\User;
use App\Commission;
use Auth, DB, Alert;
use App\CommissionSetting;
use Illuminate\Http\Request;

class CommissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAllCommissions() {
        $employeeCommissions = Commission::join('users as employees', 'employees.id', 'commissions.employee_id')
        ->join('expertise', 'expertise.id', 'employees.expertise_id')
        ->select('commissions.id', 'commissions.commission', 'commissions.created_at', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
        ->get();

        return view ('system/commissions/viewAllCommissions', 
            compact('employeeCommissions'));
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
