<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth, Alert, Input;
use App\User, App\Role;
use App\Repositories\Crudable\GenericCrudRepository;

class RolesController extends Controller
{
    protected $model;

    public function __construct(Role $role)
    {
        $this->model = new GenericCrudRepository($role);
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = $this->model->getAll();
        return view ('system/roles/index', compact('roles'));
    }

    public function create()
    {
        return view ('system/roles/create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        $exists = $this->model->exists($request->name);

        if($exists){
            Alert::error('Role already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $this->model->storeCollection($request);
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
        $this->validateInput($request);
        $this->model->update($request->all(), $id);
        Alert::success('Role has been updated!')->persistent("OK");
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        Alert::success('Role has been deleted!')->persistent("OK");
        return redirect()->back();
    }

    private function validateInput($request) {
        $this->validate($request, ['name' => 'required']);
    }
}
