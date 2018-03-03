<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Role, App\User;
use Alert, Auth;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::join('roles', 'roles.id', 'users.role_id')
            ->select('users.*', 'roles.name as role_name')
            ->get();

        return view ('system/users/index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view ('system/users/create', compact('roles'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'email' => 'required|email',
            'contact_no' => 'required', 'role_id' => 'required', 'address' => 'required'
        ]);

        //check if user already exists
        $checkExistingUser = \DB::table('users')
            ->where('firstname', 'LIKE', $request->firstname)
            ->where('lastname', 'LIKE', $request->lastname)
            ->orWhere('email', 'LIKE', $request->email)
            ->first();

        if($checkExistingUser){
            Alert::error('User already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $createUser = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact_no' => $request->contact_no,
            'gender' => $request->gender,
            'role_id' => $request->role_id,
            'address' => $request->address,
        ]);

        Alert::success('User has been Added!')->autoclose(1000);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view ('system/users/edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required', 'lastname' => 'required', 'email' => 'required|email',
            'contact_no' => 'required', 'role_id' => 'required', 'address' => 'required',
            'gender' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->role_id = $request->role_id;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        Alert::success('User has been updated!')->autoclose(1000);
        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        Alert::success('User has been deleted!')->autoclose(1000);
        return redirect()->back();
    }
}
