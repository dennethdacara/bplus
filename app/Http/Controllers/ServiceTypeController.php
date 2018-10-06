<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert, Auth, App\ServiceType;
use App\Repositories\Crudable\GenericCrudRepository;

class ServiceTypeController extends Controller
{
    protected $model;

    public function __construct(ServiceType $serviceType)
    {
        $this->model = new GenericCrudRepository($serviceType);
        $this->middleware('auth');
    }

    public function index()
    {
        $serviceTypes = $this->model->getAll();
        return view ('system/service-type/index', compact('serviceTypes'));
    }

    public function create()
    {
        return view ('system/service-type/create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        $exists = $this->model->exists($request->name);

        if($exists){
            Alert::error('Service Type already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $this->model->storeCollection($request);
        Alert::success('Service Type has been Added!')->autoclose(1000);
        return redirect()->route('service-type.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        return view ('system/service-type/edit', compact('serviceType'));
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $this->model->update($request->all(), $id);
        Alert::success('Service Type has been updated!')->autoclose(1000);
        return redirect()->route('service-type.index');
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        Alert::success('Service Type has been deleted!')->autoclose(1000);
        return redirect()->back();
    }

    private function validateInput($request)
    {
        $this->validate($request, ['name' => 'required']);
    }
}
