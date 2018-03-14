<?php
namespace App\Http\Controllers;
use App\Infraction;
use Illuminate\Http\Request;
use Auth, Alert, DB, App\User;

class InfractionsController extends Controller
{
    public function viewEmployeeInfractions() {
    	$infractions = Infraction::join('users as employees', 'employees.id', 'infractions.employee_id')
    		->select('infractions.*', 'employees.firstname', 'employees.lastname')
    		->get();

    	return view ('system/infractions/viewEmployeeInfractions', compact('infractions'));
    }

    public function create() {
    	$employees = User::where('role_id', User::IS_EMPLOYEE)->get();
    	return view ('system/infractions/create', compact('employees'));
    }

    public function store(Request $request) {
    	
    	$this->validate($request, [
    		'employee_id' => 'required', 'date' => 'required', 'type' => 'required', 'deduction' => 'required'
    	]);

    	Infraction::create([
    		'employee_id' => $request->employee_id,
    		'date' => $request->date,
    		'type' => $request->type,
    		'deduction' => $request->deduction,
    	]);

    	Alert::success('Employee Infraction has been Added!')->persistent("OK");
        return redirect()->back();

    }

    public function destroy($id) {
        $infraction = Infraction::find($id)->delete();
        Alert::success('Employee Infraction has been Deleted!')->persistent("OK");
        return redirect()->back();

    }
}
