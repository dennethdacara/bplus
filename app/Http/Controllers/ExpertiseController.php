<?php
namespace App\Http\Controllers;
use App\Expertise, App\User;
use Auth, DB, Alert;
use Illuminate\Http\Request;
use App\Repositories\Crudable\GenericCrudRepository;

class ExpertiseController extends Controller
{
    protected $model;

    public function __construct(Expertise $expertise)
    {
        $this->model = new GenericCrudRepository($expertise);
        $this->middleware('auth');
    }

    public function index()
    {
        $expertise = $this->model->getAll();
        return view ('system/expertise/index', compact('expertise'));
    }

    public function create()
    {
        return view ('system/expertise/create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        $exists = $this->model->exists($request->name);

        if($exists){
            Alert::error('Expertise already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $this->model->storeCollection($request);
        Alert::success('Expertise created successfully!')->autoclose(1000);
        return redirect()->route('expertise.index');
    }

    public function edit($id)
    {
        $expertise = Expertise::find($id);
        return view ('system/expertise/edit', compact('expertise'));
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $this->model->update($request->all(), $id);
        Alert::success('Expertise Updated!')->autoclose(1000);
        return redirect()->route('expertise.index');
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        Alert::success('Expertise deleted successfully!')->autoclose(1000);
        return redirect()->back();
    }

    private function validateInput($request)
    {
        $this->validate($request, ['name' => 'required', 'service_fee' => 'required']);
    }
}
