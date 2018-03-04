<?php
namespace App\Http\Controllers;
use App\User;
use App\Commission;
use Auth, DB, Alert;
use App\CommissionSetting;
use Illuminate\Http\Request;

class EmployeeCommissionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function viewAllCommissions() {
        $myCommissions = Commission::join('users as employees', 'employees.id', 'commissions.employee_id')
        ->select('commissions.id', 'commissions.commission', 'commissions.created_at', 'employees.firstname', 'employees.lastname', 'employees.expertise')
        ->where('employees.id', Auth::user()->id)
        ->get();

        return view ('employees/commissions/viewAllCommissions', 
            compact('myCommissions'));
    }
}
