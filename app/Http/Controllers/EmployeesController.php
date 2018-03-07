<?php
namespace App\Http\Controllers;
use App\User;
use App\Salary;
use Auth, Alert;
use App\Expertise;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = User::join('roles', 'roles.id', 'users.role_id')
            ->join('expertise', 'expertise.id', 'users.expertise_id')
            ->select('users.*', 'roles.name as role_name', 'expertise.name as expertise')
            ->where('users.role_id', User::IS_EMPLOYEE)
            ->get();

        return view ('system/employees/index', compact('employees'));
    }

    public function create()
    {
        $expertise = Expertise::all();
        return view ('system/employees/create', compact('expertise'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'email' => 'required|email',
            'contact_no' => 'required', 'address' => 'required', 'expertise_id' => 'required',
            'employee_salary' => 'required'
        ]);

        //check if employee already exists
        $checkExistingEmployee = \DB::table('users')
            ->where('firstname', 'LIKE', $request->firstname)
            ->where('lastname', 'LIKE', $request->lastname)
            ->orWhere('email', 'LIKE', $request->email)
            ->first();

        if($checkExistingEmployee){
            Alert::error('Employee already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $createEmployee = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact_no' => $request->contact_no,
            'gender' => $request->gender,
            'address' => $request->address,
            'role_id' => 3,
            'expertise_id' => $request->expertise_id
        ]);

        $createEmployeeSalary = Salary::create([
            'employee_id' => $createEmployee->id,
            'employee_salary' => $request->employee_salary
        ]);

        Alert::success('Employee has been Added!')->autoclose(1000);
        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employee = User::join('salary', 'salary.employee_id', 'users.id')
            ->select('users.id', 'users.*', 'salary.employee_salary')
            ->where('users.id', $id)
            ->first();

        $expertise = Expertise::all();
        return view ('system/employees/edit', compact('employee', 'expertise'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'email' => 'required|email',
            'contact_no' => 'required', 'address' => 'required', 'expertise_id' => 'required',
            'gender' => 'required'
        ]);

        $employee = User::findOrFail($id);

        $employee->firstname = $request->firstname;
        $employee->middlename = $request->middlename;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->contact_no = $request->contact_no;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->expertise_id = $request->expertise_id;
        $employee->save();

        $employee_salary = Salary::where('employee_id', $id)->first();
        $employee_salary->employee_salary = $request->employee_salary;
        $employee_salary->save();

        Alert::success('Employee has been updated!')->autoclose(1000);
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = User::findOrFail($id)->delete();
        //delete employee salary
        $employee_salary = Salary::where('employee_id', $id)->delete();

        Alert::success('Employee has been deleted!')->autoclose(1000);
        return redirect()->back();
    }
}
