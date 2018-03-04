<?php
namespace App\Http\Controllers;
use App\Expertise;
use Auth, DB, Alert;
use App\User;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $expertise = Expertise::all();
        return view ('system/expertise/index', compact('expertise'));
    }

    public function create()
    {
        return view ('system/expertise/create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required', 'service_fee' => 'required'
        ]);

        //check if expertise already exists
        $checkExistingExpertise = \DB::table('expertise')
            ->where('name', 'LIKE', $request->name)
            ->first();

        if($checkExistingExpertise){
            Alert::error('Expertise already exists!')->autoclose(1000);
            return redirect()->back()->withInput(Input::all());
        }

        $insertExpertise = Expertise::create([
            'name' => $request->name,
            'service_fee' => $request->service_fee
        ]);

        Alert::success('Expertise created successfully!')->autoclose(1000);
        return redirect()->route('expertise.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $expertise = Expertise::find($id);
        return view ('system/expertise/edit', compact('expertise'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required', 'service_fee' => 'required'
        ]);

        $expertise = Expertise::find($id);
        $expertise->name = $request->name;
        $expertise->service_fee = $request->service_fee;
        $expertise->save();

        Alert::success('Expertise Updated!')->autoclose(1000);
        return redirect()->route('expertise.index');
    }

    public function destroy($id)
    {
        $expertise = Expertise::findOrFail($id)->delete();
        Alert::success('Expertise deleted successfully!')->autoclose(1000);
        return redirect()->back();
    }
}
