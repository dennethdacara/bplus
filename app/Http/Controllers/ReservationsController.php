<?php
namespace App\Http\Controllers;
use App\User, App\Service, App\Expertise;
use App\Reservation, App\ServiceType;
use App\Billing, App\BillingService;
use App\ReservationService;
use Auth, DB, Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function viewAllReservations() {
		$reservations = Reservation::join('users', 'users.id', 'reservations.customer_id')
			->join('users as users1', 'users1.id', 'reservations.employee_id')
			->leftjoin('users as users2', 'users2.id', 'reservations.processed_by')
			->select('reservations.*', 'users.firstname as customer_firstname', 'reservations.created_at as date_added', 'users.lastname as customer_lastname', 'users1.firstname as hairstylist', 
				'users2.firstname as processedByFirstname', 'users2.lastname as processedByLastname')
			->get();

		$getServices = ReservationService::join('services', 'services.id', 'reservation_service.service_id')
			->get();

		return view ('system/reservation/viewAllReservations', 
			compact('reservations', 'getServices'));
	}

    public function addHomeServiceReservation() {
    	$service_types = ServiceType::all();
    	$services = Service::all();
    	$employees = User::join('expertise', 'expertise.id', 'users.expertise_id')
            ->select('users.id', 'users.firstname', 'users.lastname', 'expertise.name as expertise')
            ->where('role_id', User::IS_EMPLOYEE)->get();

    	return view ('system/reservation/home-service/addHomeServiceReservation', 
    		compact('service_types', 'services', 'employees'));
    }

    public function storeHomeServiceReservation(Request $request) {

    	$this->validate($request, [
    		'firstname' => 'required', 'lastname' => 'required', 'reservation_date' => 'required',
    		'reservation_time' => 'required', 'address' => 'required', 'employee_id' => 'required',
    		'service_id' => 'required'
    	]);

    	$checkCustomer = User::where('firstname', 'LIKE', "%$request->firstname%")
    		->where('lastname', 'LIKE', "%$request->lastname")
    		->where('role_id', User::IS_CUSTOMER)
    		->select('users.id as customer_id')
    		->first();

    	//if user exists
    	if($checkCustomer) {
    		
    		$checkReservationConflict = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', $request->reservation_date)
            ->where('employee_id', $request->employee_id)
            ->where('status', '!=', 'Cancelled')
            ->first();

            $checkReservationConflict1 = Reservation::where('reservation_time', $request->reservation_time)
            	->where('reservation_date', $request->reservation_date)
            	->where('customer_id', $checkCustomer->user_id)
                ->where('status', '!=', 'Cancelled')
            	->first();
            //check if customer is currently reserved with same date/time

	        if($checkReservationConflict || $checkReservationConflict1) {
	            Alert::error('Home Service Reservation Has Conflict!')->persistent("OK");
	            return redirect()->back()->withInput(Input::all());
	        } else { //IF THERE IS NO CONFLICT
	        	$createHomeServiceReservation = Reservation::create([
	        		'customer_id' => $checkCustomer->customer_id,
	        		'reservation_date' => $request->reservation_date,
	        		'reservation_time' => $request->reservation_time,
	        		'employee_id' => $request->employee_id,
	        		'type' => 'Home Service',
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

		        Alert::success('Home Service Reservation Successful!')->persistent("OK");
    			return redirect()->route('viewAllReservations');

	        }

    	} else { //if customer doesnt exist
    		
    		$generateEmail = $request->firstname.$request->lastname.'@gmail.com';

    		$createNewUser = User::create([
    			'role_id' => 2,
    			'firstname' => $request->firstname,
    			'lastname' => $request->lastname,
    			'email' => $generateEmail,
    			'password' => bcrypt('password'),
    			'contact_no' => '09123456789',
    			'address' => $request->address,
    			'gender' => 'male'
    		]);

    		$checkReservationConflict = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', '=', $request->reservation_date)
            ->where('employee_id', $request->employee_id)
            ->where('status', '!=', 'Cancelled')
            ->first();
            //check if employee is currently reserved with same date/time

            $checkReservationConflict1 = Reservation::where('reservation_time', $request->reservation_time)
            	->where('reservation_date', $request->reservation_date)
            	->where('customer_id', $createNewUser->customer_id)
                ->where('status', '!=', 'Cancelled')
            	->first();
            //check if customer is currently reserved with same date/time

	        if($checkReservationConflict || $checkReservationConflict1) {
	            Alert::error('Home Service Reservation Has Conflict!')->persistent("OK");
	            return redirect()->back()->withInput(Input::all());
	        } else { //IF THERE IS NO CONFLICT
	        	$createHomeServiceReservation = Reservation::create([
	        		'customer_id' => $createNewUser->id,
	        		'reservation_date' => $request->reservation_date,
	        		'reservation_time' => $request->reservation_time,
	        		'employee_id' => $request->employee_id,
	        		'type' => 'Home Service',
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

		        Alert::success('Home Service Reservation Successful!')->persistent("OK");
    			return redirect()->route('viewAllReservations');

    		}
    	}

    }

    public function addOnSpaReservation() {
    	$service_types = ServiceType::all();
    	$services = Service::all();
    	$employees = User::join('expertise', 'expertise.id', 'users.expertise_id')
            ->select('users.id', 'users.firstname', 'users.lastname', 'expertise.name as expertise')
            ->where('role_id', User::IS_EMPLOYEE)->get();
            
    	return view ('system/reservation/on-spa/addOnSpaReservation', 
    		compact('service_types', 'services', 'employees'));
    }

    public function storeOnSpaReservation(Request $request) {
    	$this->validate($request, [
    		'firstname' => 'required', 'lastname' => 'required', 'reservation_date' => 'required',
    		'reservation_time' => 'required', 'employee_id' => 'required',
    		'service_id' => 'required'
    	]);

    	$checkCustomer = User::where('firstname', 'LIKE', "%$request->firstname%")
    		->where('lastname', 'LIKE', "%$request->lastname")
    		->where('role_id', User::IS_CUSTOMER)
    		->select('users.id as customer_id')
    		->first();

    	//if user exists
    	if($checkCustomer) {

    		$checkReservationConflict = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', $request->reservation_date)
            ->where('employee_id', $request->employee_id)
            ->where('status', '!=', 'Cancelled')
            ->first();

            $checkReservationConflict1 = Reservation::where('reservation_time', $request->reservation_time)
            	->where('reservation_date', $request->reservation_date)
            	->where('customer_id', $checkCustomer->customer_id)
                ->where('status', '!=', 'Cancelled')
                ->first();
            //check if customer is currently reserved with same date/time

            if($checkReservationConflict || $checkReservationConflict1) {
	            Alert::error('On Salon Reservation Has Conflict!')->persistent("OK");
	            return redirect()->back()->withInput(Input::all());
	        } else { //IF THERE IS NO CONFLICT
	        	$createOnSalonReservation = Reservation::create([
	        		'customer_id' => $checkCustomer->customer_id,
	        		'reservation_date' => $request->reservation_date,
	        		'reservation_time' => $request->reservation_time,
	        		'employee_id' => $request->employee_id,
	        		'type' => 'On Salon',
	        		'address' => 'Not Provided',
	        		'status' => 'Pending'
	        	]);

	        	$i = 0; 
		        foreach($request->service_id as $key => $v){
		            $createReservationServicePivot = ReservationService::create([
		                'reservation_id' => $createOnSalonReservation->id,
		                'service_id' => $request->service_id[$i],
		            ]);
		            $i++;
		        }

		        Alert::success('On Salon Reservation Successful!')->persistent("OK");
    			return redirect()->route('viewAllReservations');
	        }
    	} else { //if customer doesnt exist
    		
    		$generateEmail = $request->firstname.$request->lastname.'@gmail.com';

    		$createNewUser = User::create([
    			'role_id' => 2,
    			'firstname' => $request->firstname,
    			'lastname' => $request->lastname,
    			'email' => $generateEmail,
    			'password' => bcrypt('password'),
    			'contact_no' => '09123456789',
    			'address' => 'Not Provided',
    			'gender' => 'male'
    		]);

    		$checkReservationConflict = Reservation::where('reservation_time', $request->reservation_time)
            ->where('reservation_date', '=', $request->reservation_date)
            ->where('employee_id', $request->employee_id)
            ->where('status', '!=', 'Cancelled')
            ->first();
            //check if employee is currently reserved with same date/time

            $checkReservationConflict1 = Reservation::where('reservation_time', $request->reservation_time)
            	->where('reservation_date', $request->reservation_date)
            	->where('customer_id', $createNewUser->id)
                ->where('status', '!=', 'Cancelled')
            	->first();
            //check if customer is currently reserved with same date/time

	        if($checkReservationConflict || $checkReservationConflict1) {
	            Alert::error('On Salon Reservation Has Conflict!')->persistent("OK");
	            return redirect()->back()->withInput(Input::all());
	        } else { //IF THERE IS NO CONFLICT
	        	$createOnSalonReservation = Reservation::create([
	        		'customer_id' => $createNewUser->id,
	        		'reservation_date' => $request->reservation_date,
	        		'reservation_time' => $request->reservation_time,
	        		'employee_id' => $request->employee_id,
	        		'type' => 'On Salon',
	        		'address' => 'Not Provided',
	        		'status' => 'Pending'
	        	]);

	        	$i = 0; 
		        foreach($request->service_id as $key => $v){
		            $createReservationServicePivot = ReservationService::create([
		                'reservation_id' => $createOnSalonReservation->id,
		                'service_id' => $request->service_id[$i],
		            ]);
		            $i++;
		        }

		        Alert::success('On Salon Reservation Successful!')->persistent("OK");
    			return redirect()->route('viewAllReservations');
    		}
    	}
    }

    public function adminApproveReservation($reservation_id) {
    	$reservation = Reservation::where('id', $reservation_id)->first();
    	$reservation->status = 'Approved';
    	$approved_by = Auth::user()->id;
    	$reservation->processed_by = $approved_by;
    	$reservation->save();

        //get services from pivot
        $getServicesFromPivot = ReservationService::join('services', 'services.id', 'reservation_service.service_id')
            ->join('reservations', 'reservations.id', 'reservation_service.reservation_id')
            ->select('services.id as service_id', 'services.name as service_name', 'services.price as amount', 'reservation_service.reservation_id as reservation_id', 'reservations.customer_id as customer_id',
                'reservations.employee_id as stylist_id')
            ->where('reservation_service.reservation_id', $reservation_id)
            ->get();

        //Insert to billing
        $insertToBillingTable = Billing::create([
            'customer_id' => $getServicesFromPivot[0]->customer_id,
            'employee_id' => $getServicesFromPivot[0]->stylist_id,
            'cashier_id' => Auth::user()->id,
            'status' => 'Waiting for Payment'
        ]);

        foreach($getServicesFromPivot as $getServicesFromPivot1){
            $billing_id[] = $insertToBillingTable->id;
            $service_id[] = $getServicesFromPivot1->service_id;
            $amount[] = $getServicesFromPivot1->amount;
        }

        for($i=0;$i<count($service_id);$i++){
            BillingService::create([
                'billing_id' => $billing_id[$i], 
                'service_id' => $service_id[$i], 
                'amount' => $amount[$i]
            ]);
        }

    	Alert::success('Reservation Approved!')->persistent("OK");
    	return redirect()->back();
    }

    public function adminCancelReservation($reservation_id) {
    	$reservation = Reservation::where('id', $reservation_id)->first();
    	$reservation->status = 'Cancelled';
    	$cancelled_by = Auth::user()->id;
    	$reservation->processed_by = $cancelled_by;
    	$reservation->save();

    	Alert::success('Reservation Cancelled!')->persistent("OK");
    	return redirect()->back();

    }

}
