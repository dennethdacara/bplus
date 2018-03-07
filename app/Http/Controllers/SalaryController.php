<?php
namespace App\Http\Controllers;
use App\Salary, App\User;
use Auth, DB, Alert;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$employee_salary = Salary::join('users as employees', 'employees.id', 'salary.employee_id')
    		->join('expertise', 'expertise.id', 'employees.expertise_id')
    		->select('salary.id as salary_id', 'salary.employee_salary', 'salary.created_at', 'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
    		->get();

       	return view ('system/salary/index', compact('employee_salary'));
    }

    public function edit($id)
    {
        $employee_salary = Salary::join('users as employees', 'employees.id', 'salary.employee_id')
    		->join('expertise', 'expertise.id', 'employees.expertise_id')
    		->select('salary.id as salary_id', 'salary.employee_salary', 'salary.created_at', 
    			'employees.firstname', 'employees.lastname', 'expertise.name as expertise')
    		->where('salary.id', $id)
    		->first();

    	return view('system/salary/edit', compact('employee_salary'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
        	'employee_salary' => 'required'
        ]);

        $employee_salary = Salary::find($id);
        $employee_salary->employee_salary = $request->employee_salary;
        $employee_salary->save();

        Alert::success('Salary Updated!')->autoclose(1000);
        return redirect()->route('salary.index');
    }

    public function destroy($id)
    {
        //
    }
}
