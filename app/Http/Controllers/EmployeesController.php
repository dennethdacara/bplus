<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth, Alert;
use App\User;

class EmployeesController extends Controller
{

    public function index()
    {
        $employees = User::join('roles', 'roles.id', 'users.role_id')
            ->select('users.*', 'roles.name as role_name')
            ->where('users.role_id', User::IS_EMPLOYEE)
            ->get();

        return view ('system/employees/index', compact('employees'));
    }

    public function create()
    {
        return view ('system/employees/create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'email' => 'required|email',
            'contact_no' => 'required', 'address' => 'required', 'expertise' => 'required'
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
            'expertise' => $request->expertise
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
        $employee = User::findOrFail($id);
        return view ('system/employees/edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'email' => 'required|email',
            'contact_no' => 'required', 'address' => 'required', 'expertise' => 'required',
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
        $employee->expertise = $request->expertise;
        $employee->save();

        Alert::success('Employee has been updated!')->autoclose(1000);
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = User::findOrFail($id)->delete();
        Alert::success('Employee has been deleted!')->autoclose(1000);
        return redirect()->back();
    }
}
