<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class DashboardController extends Controller
{

	public function redirectToDashboard() {
		if(Auth::user()->role->id == User::IS_ADMIN){
            return redirect()->route('adminDashboard');
        }
        else if(Auth::user()->role->id == User::IS_CUSTOMER){
            return redirect()->route('customerDashboard');
        }
        else if(Auth::user()->role->id == User::IS_EMPLOYEE){
            return redirect()->route('employeeDashboard');
        }
	}

    public function adminDashboard() {
    	return view ('dashboards/admin/dashboard');
    }

    public function customerDashboard() {
    	return view ('dashboards/customer/dashboard');
    }

    public function employeeDashboard() {
        return view ('dashboards/employee/dashboard');
    }
}
