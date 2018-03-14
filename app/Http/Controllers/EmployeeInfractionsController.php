<?php
namespace App\Http\Controllers;
use App\Infraction;
use Illuminate\Http\Request;
use Auth, Alert, DB, App\User;

class EmployeeInfractionsController extends Controller
{
    public function index() {
    	$infractions = Infraction::where('employee_id', Auth::user()->id)->get();

    	return view ('employees/infractions/index', compact('infractions'));
    }
}
