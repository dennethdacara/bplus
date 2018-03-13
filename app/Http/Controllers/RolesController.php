<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth, Alert;
use App\User, App\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        return view ('system/roles/index', compact('roles'));
    }

    public function create()
    {
        return view ('system/roles/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        //check if role already exists
        $checkExistingRole = \DB::table('roles')
            ->where('name', 'LIKE', $request->name)
            ->first();

        if($checkExistingRole){
            Alert::error('Role already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $createRole = Role::create([
            'name' => $request->name,
        ]);

        Alert::success('Role has been Added!')->persistent("OK");
        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view ('system/roles/edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        Alert::success('Role has been updated!')->persistent("OK");
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id)->delete();
        Alert::success('Role has been deleted!')->persistent("OK");
        return redirect()->back();
    }
}
