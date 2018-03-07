<?php
namespace App\Http\Controllers;
use Auth, DB, Alert;
use App\User, App\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    public function editVatSettings() {
    	$currentVatSettings = Vat::first();
    	return view ('system/vat/vatSettings', compact('currentVatSettings'));
    }

    public function updateVatSettings(Request $request) {
    	$this->validate($request, [
        	'percentage' => 'required'
        ]);

        $VatSettings = Vat::first();
        $VatSettings->percentage = $request->percentage;
        $VatSettings->save();

        Alert::success('Vat Settings Updated!')->autoclose(1000);
        return redirect()->back();
    }
}
