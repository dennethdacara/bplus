<?php
namespace App\Http\Controllers;
use Auth, Alert, App\User, App\Service;
use App\ServiceType, App\Expertise, Validator;
use Illuminate\Http\Request;
use App\Repositories\Crudable\GenericCrudRepository;

class ServicesController extends Controller
{
    protected $model;

    public function __construct(Service $service)
    {
        $this->model = new GenericCrudRepository($service);
        $this->middleware('auth');
    }

    public function index()
    {   
        $services = $this->model->getServices();
        return view ('system/services/index', compact('services'));
    }
 
    public function create()
    {
        $serviceTypes = ServiceType::all();
        $expertise = Expertise::all();
        return view ('system/services/create', compact('serviceTypes', 'expertise'));
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        $exists = $this->model->exists($request->name);

        if($exists){
            Alert::error('Service already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $this->model->storeCollection($request);
        Alert::success('Service has been Added!')->persistent("OK");
        return redirect()->route('services.index');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $serviceTypes = ServiceType::all();
        $expertise = Expertise::all();
        return view ('system/services/edit', compact('service', 'serviceTypes', 'expertise'));
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $this->model->update($request->all(), $id);
        Alert::success('Service has been updated!')->autoclose(1000);
        return redirect()->route('services.index');
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        Alert::success('Service has been deleted!')->autoclose(1000);
        return redirect()->back();
    }

    private function validateInput($request)
    {
        return $this->validate($request, [
            'name' => 'required', 'price' => 'required', 'service_type_id' => 'required',
            'expertise_id' => 'required'
        ]);
    }
}
