<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert, Auth;
use App\ServiceType;

class ServiceTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $serviceTypes = ServiceType::all();
        return view ('system/service-type/index', compact('serviceTypes'));
    }

    public function create()
    {
        return view ('system/service-type/create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        //check if service type already exists
        $checkExistingServiceType = \DB::table('service_type')
            ->where('name', 'LIKE', $request->name)
            ->first();

        if($checkExistingServiceType){
            Alert::error('Service Type already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $createServiceType = ServiceType::create([
            'name' => $request->name,
        ]);

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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $serviceType = ServiceType::find($id);
        $serviceType->name = $request->name;
        $serviceType->save();
        Alert::success('Service Type has been updated!')->autoclose(1000);
        return redirect()->route('service-type.index');

    }

    public function destroy($id)
    {
        $serviceType = ServiceType::findOrFail($id)->delete();
        Alert::success('Service Type has been deleted!')->autoclose(1000);
        return redirect()->back();
    }
}
