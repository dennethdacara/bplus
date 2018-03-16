@extends('layouts.app')
@include('includes.customer-navbar')

@section('content')

	<div id="applgreen">
	    <div class="container">
			<div class="row">
				<h3></h3>
			</div>
	    </div>
	</div>
	<br>

	<div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-8">
	 			<h4>On Salon Reservation</h4>
	 			<div class="hline"></div>
	 			<form role="form" method="POST" action="{{ route('customerStoreOnSpaReservation') }}">
                   	{{ csrf_field() }}

                   	<input type="hidden" name="customer_id" value="{{Auth::user()->id}}">

					<div class="row">
						<div class="col-lg-6 col-md-6">
							<br><label>Reservation Date:</label>
							<input type="text" id="addHomeReservation" name="reservation_date" value="{{old('reservation_date')}}" class="form-control" placeholder="Please choose a date..." readonly="true">
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Reservation Time:</label>
							<select name="reservation_time" class="form-control">
								<option value="">-Select One-</option>
								<option value="07:00 - 07:30 AM">07:00 - 07:30 AM</option>
								<option value="07:30 - 08:00 AM">07:30 - 08:00AM</option>
								<option value="08:00 - 08:30 AM">08:00 - 08:30AM</option>
								<option value="08:30 - 09:00 AM">08:30 - 09:00AM</option>
								<option value="09:00 - 09:30 AM">09:00 - 09:30AM</option>
								<option value="09:30 - 10:00 AM">09:30 - 10:00AM</option>
								<option value="10:00 - 10:30 AM">10:00 - 10:30AM</option>
								<option value="10:30 - 11:00 AM">10:30 - 11:00AM</option>
								<option value="11:00 - 11:30 AM">11:00 - 11:30AM</option>
								<option value="11:30 AM - 12:00 PM">11:30AM - 12:00PM</option>
								<option value="12:00 - 12:30 PM">12:00 - 12:30PM</option>
								<option value="12:30 - 1:00 PM">12:30 - 1:00PM</option>
								<option value="1:00 - 1:30 PM">1:00 - 1:30PM</option>
								<option value="1:30 - 2:00 PM">1:30 - 2:00PM</option>
								<option value="2:00 - 2:30 PM">2:00 - 2:30PM</option>
								<option value="2:30 - 3:00 PM">2:30 - 3:00PM</option>
								<option value="3:00 - 3:30 PM">3:00 - 3:30PM</option>
								<option value="3:30 - 4:00 PM">3:30 - 4:00PM</option>
								<option value="4:00 - 4:30 PM">4:00 - 4:30PM</option>
								<option value="4:30 - 5:00 PM">4:30 - 5:00PM</option>
								<option value="5:00 - 5:30 PM">5:00 - 5:30PM</option>
								<option value="5:30 - 6:00 PM">5:30 - 6:00PM</option>
								<option value="6:00 - 6:30 PM">6:00 - 6:30PM</option>
								<option value="6:30 - 7:00 PM">6:30 - 7:00PM</option>
								<option value="7:00 - 7:30 PM">7:00 - 7:30PM</option>
								<option value="7:30 - 8:00 PM">7:30 - 8:00PM</option>

							</select>

							@if ($errors->has('reservation_time'))
                                <strong>{{ $errors->first('reservation_time') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Hair Stylist:</label>
							<select name="employee_id[]" class="selectpicker form-control" id="CustomerSelectOnSalonEmpId" multiple data-live-search="true" multiple data-selected-text-format="count > 1">
								@foreach($employees as $employee)
									<option value="{{$employee->id}}" data-id="{{$employee->expertise_id}}">{{$employee->firstname}} {{$employee->lastname}} | Expertise: {{$employee->expertise}}</option>
								@endforeach
							</select>

							@if ($errors->has('employee_id'))
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row col-lg-12">
						<br><h3>Services :</h3>
						@foreach($expertise as $expertise1)
							<div id="{{$expertise1->id}}" class="sample4" style="display:none;">
								<h3>{{$expertise1->name}}</h3>
								<ul class="checkboxes1" style="columns: 4 8em;">
			                        @foreach($services as $service)
		                        		@if($service->expertise_id == $expertise1->id)
			                        		<label>
				                        		<input type="checkbox" name="service_id[]" value="{{$service->id}}" style="" 
				                        		@if(is_array(old('service_id')) && in_array($service->id, old('service_id'))) checked @endif />
				                        		{{$service->name}} (&#8369;{{$service->price}})
			                        		</label>
		                        		@endif
			                        @endforeach 
			                    </ul>
		                    </div>
						@endforeach
					</div>

					<div class="row col-lg-12">
						<br>
			  			<button type="submit" class="btn btn-theme">Submit</button>
			  		</div>
					
				</form>
			</div>
	 		
	 		<div class="col-lg-4">
		 		<h4>Services: </h4>
		 		<div class="hline"></div>
	 			<p>
	 				#3 Zeus st.. UNIT 5 GOLDSTAR BLDG.,<br/>
	 				ST.MICHAEL,<br/>
	 				PANDAYAN MEYCAUAYAN,BULACAN..<br/>
	 			</p>
	 			<p>Phone: 0949-9653081 / 0905-541-5816 / 738-4026</p>
	 		</div>
	 	</div>
	 </div>


@stop