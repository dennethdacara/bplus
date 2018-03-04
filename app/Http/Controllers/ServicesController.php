<?php
namespace App\Http\Controllers;
use Auth, Alert;
use App\ServiceType;
use App\User, App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::join('service_type', 'service_type.id', 'services.service_type_id')
            ->select('services.*', 'service_type.name as service_type')
            ->get();
        return view ('system/services/index', compact('services'));
    }

 
    public function create()
    {
        $serviceTypes = ServiceType::all();
        return view ('system/services/create', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'price' => 'required', 'service_type_id' => 'required'
        ]);

        //check if service already exists
        $checkExistingService = \DB::table('services')
            ->where('name', 'LIKE', $request->name)
            ->first();

        if($checkExistingService){
            Alert::error('Service already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $createService = Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'service_type_id' => $request->service_type_id,
        ]);

        Alert::success('Service has been Added!')->autoclose(1000);
        return redirect()->route('services.index');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $serviceTypes = ServiceType::all();
        return view ('system/services/edit', compact('service', 'serviceTypes'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required', 'price' => 'required', 'service_type_id' => 'required'
        ]);

        $service = Service::findOrFail($id);

        $service->name = $request->name;
        $service->price = $request->price;
        $service->service_type_id = $request->service_type_id;
        $service->save();

        Alert::success('Service has been updated!')->autoclose(1000);
        return redirect()->route('services.index');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id)->delete();
        Alert::success('Service has been deleted!')->autoclose(1000);
        return redirect()->back();
    }
}
