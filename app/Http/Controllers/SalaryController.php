<?php
namespace App\Http\Controllers;
use App\Salary, App\User;
use Auth, DB, Alert;
use Illuminate\Http\Request;
use App\Repositories\Crudable\GenericCrudRepository;

class SalaryController extends Controller
{
    protected $model;

	public function __construct(Salary $salary)
    {
        $this->model = new GenericCrudRepository($salary);
        $this->middleware('auth');
    }

    public function index()
    {
    	$employee_salary = $this->model->getSalaries();
       	return view ('system/salary/index', compact('employee_salary'));
    }

    public function edit($id)
    {
        $employee_salary = $this->model->findSalary($id);
    	return view('system/salary/edit', compact('employee_salary'));
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $this->model->update($request->all(), $id);
        Alert::success('Salary Updated!')->autoclose(1000);
        return redirect()->route('salary.index');
    }

    public function destroy($id)
    {
        //
    }

    private function validateInput($request)
    {
        $this->validate($request, ['employee_salary' => 'required']);
    }
}
