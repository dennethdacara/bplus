<?php
namespace App\Http\Controllers;
use App\User, Auth, Alert, DB;
use App\Service;
use App\Reservation;
use App\ServiceType;
use App\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CustomerReservationController extends Controller
{
    public function viewAllReservations() {
        $reservations = Reservation::join('users', 'users.id', 'reservations.customer_id')
            ->join('users as users1', 'users1.id', 'reservations.employee_id')
            ->leftjoin('users as users2', 'users2.id', 'reservations.processed_by')
            ->select('reservations.*', 'users.firstname as customer_firstname', 'reservations.created_at as date_added', 'users.lastname as customer_lastname', 'users1.firstname as hairstylist', 
                'users2.firstname as processedByFirstname', 'users2.lastname as processedByLastname')
            ->where('reservations.customer_id', Auth::user()->id)
            ->orderBy('reservations.created_at', 'desc')->paginate(8);

        $getServices = ReservationService::join('services', 'services.id', 'reservation_service.service_id')
            ->get();

        return view ('customers/reservation/viewAllReservations', compact('reservations', 'getServices'));
    }

    public function customerCancelReservation($reservation_id) {
        $reservation = Reservation::where('id', $reservation_id)->first();
        $reservation->status = 'Cancelled';
        $cancelled_by = Auth::user()->id;
        $reservation->processed_by = $cancelled_by;
        $reservation->save();

        Alert::success('Reservation Cancelled!')->autoclose(1000);
        return redirect()->back();
    }

    public function addHomeServiceReservation() {
    	$service_types = ServiceType::all();
    	$services = Service::all();
    	$employees = User::where('role_id', User::IS_EMPLOYEE)->get();

    	return view ('customers/reservation/home-service/addHomeServiceReservation', 
    		compact('service_types', 'services', 'employees'));
    }

    public function storeHomeServiceReservation(Request $request) {

    	$this->validate($request, [
    		'reservation_date' => 'required', 'reservation_time' => 'required', 'address' => 'required', 
    		'employee_id' => 'required', 'service_id' => 'required'
    	]);

    	$checkReservationConflict = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', $request->reservation_date)
            ->where('employee_id', $request->employee_id)
            ->first();

        $checkReservationConflict1 = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', $request->reservation_date)
            ->where('customer_id', $request->customer_id)
            ->first();
        //check if customer is currently reserved with same date/time

        if($checkReservationConflict || $checkReservationConflict1) {
        	Alert::error('Home Service Reservation Has Conflict!')->autoclose(1000);
	        return redirect()->back()->withInput(Input::all());
        } else { //IF THERE IS NO CONFLICT
        	$createHomeServiceReservation = Reservation::create([
        		'customer_id' => $request->customer_id,
        		'reservation_date' => $request->reservation_date,
        		'reservation_time' => $request->reservation_time,
        		'employee_id' => $request->employee_id,
        		'type' => 'Home Service',
        		'address' => $request->address,
        		'status' => 'Pending'
        	]);
        }

        $i = 0; 
        foreach($request->service_id as $key => $v){
            $createReservationServicePivot = ReservationService::create([
                'reservation_id' => $createHomeServiceReservation->id,
                'service_id' => $request->service_id[$i],
            ]);
            $i++;
        }

        Alert::success('Customer Home Service Reservation Successful!')->autoclose(1000);
    	return redirect()->back();

    }

    public function addOnSpaReservation() {
    	$service_types = ServiceType::all();
    	$services = Service::all();
    	$employees = User::where('role_id', User::IS_EMPLOYEE)->get();

    	return view ('customers/reservation/on-spa/addOnSpaReservation',
    		compact('service_types', 'services', 'employees'));
    }

    public function storeOnSpaReservation(Request $request) {

    	$this->validate($request, [
    		'reservation_date' => 'required', 'reservation_time' => 'required', 
    		'address' => 'required', 'employee_id' => 'required', 'service_id' => 'required'
    	]);

    	$checkReservationConflict = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', $request->reservation_date)
            ->where('employee_id', $request->employee_id)->first();

        $checkReservationConflict1 = Reservation::where('reservation_time', $request->reservation_time)
        	->where('reservation_date', $request->reservation_date)
        	->where('customer_id', $request->customer_id)->first();
        //check if customer is currently reserved with same date/time

       	if($checkReservationConflict || $checkReservationConflict1) {
	            Alert::error('On Spa Reservation Has Conflict!')->autoclose(1000);
	            return redirect()->back()->withInput(Input::all());
	        } else { //IF THERE IS NO CONFLICT
	        	$createHomeServiceReservation = Reservation::create([
	        		'customer_id' => $request->customer_id,
	        		'reservation_date' => $request->reservation_date,
	        		'reservation_time' => $request->reservation_time,
	        		'employee_id' => $request->employee_id,
	        		'type' => 'On Spa',
	        		'address' => $request->address,
	        		'status' => 'Pending'
	        	]);

	        	$i = 0; 
		        foreach($request->service_id as $key => $v){
		            $createReservationServicePivot = ReservationService::create([
		                'reservation_id' => $createHomeServiceReservation->id,
		                'service_id' => $request->service_id[$i],
		            ]);
		            $i++;
		        }

		        Alert::success('Customer On Spa Reservation Successful!')->autoclose(1000);
    			return redirect()->back();
	        }
    }


}
