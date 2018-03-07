@extends('layouts.app')
@include('includes.admin-navbar')

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
	 			<h4>Home Service Reservation</h4>
	 			<div class="hline"></div>
	 			<form role="form" method="POST" action="{{ route('storeHomeServiceReservation') }}">
                   	{{ csrf_field() }}

	 				<div class="row"><br>

						<div class="col-lg-6 col-md-6">
							<br><label>First Name:</label>
							<input type="name" class="form-control" @if ($errors->has('firstname')) style="border-color: red;" @endif name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="First Name">

							@if ($errors->has('firstname'))
                                <strong>{{ $errors->first('firstname') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Last Name:</label>
							<input type="name" class="form-control" @if ($errors->has('lastname')) style="border-color: red;" @endif name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Last Name">

							@if ($errors->has('lastname'))
                                <strong>{{ $errors->first('lastname') }}</strong>
                            @endif
						</div>

					</div>

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
								<option value="12:30 - 13:00 PM">12:30 - 1:00PM</option>
								<option value="13:00 - 13:30 PM">1:00 - 1:30PM</option>
								<option value="13:30 - 14:00 PM">1:30 - 2:00PM</option>
								<option value="14:00 - 14:30 PM">2:00 - 2:30PM</option>
								<option value="14:30 - 15:00 PM">2:30 - 3:00PM</option>
								<option value="15:00 - 15:30 PM">3:00 - 3:30PM</option>
								<option value="15:30 - 16:00 PM">3:30 - 4:00PM</option>
								<option value="16:00 - 16:30 PM">4:00 - 4:30PM</option>
								<option value="16:30 - 17:00 PM">4:30 - 5:00PM</option>
								<option value="17:00 - 17:30 PM">5:00 - 5:30PM</option>
								<option value="17:30 - 18:00 PM">5:30 - 6:00PM</option>
								<option value="18:00 - 18:30 PM">6:00 - 6:30PM</option>
								<option value="18:30 - 19:00 PM">6:30 - 7:00PM</option>
								<option value="19:00 - 19:30 PM">7:00 - 7:30PM</option>
								<option value="19:30 - 20:00 PM">7:30 - 8:00PM</option>

							</select>

							@if ($errors->has('reservation_time'))
                                <strong>{{ $errors->first('reservation_time') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Address:</label>
							<textarea name="address" cols="30" rows="3" style="resize:vertical;" class="form-control">{{old('address')}}</textarea>

							@if ($errors->has('address'))
                                <strong>{{ $errors->first('address') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Hairstylist:</label>
							<select name="employee_id" id="" class="form-control">
								@foreach($employees as $employee)
									<option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}} | Expertise: {{$employee->expertise}}</option>
								@endforeach
							</select>

							@if ($errors->has('employee_id'))
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row col-lg-12">
						<br><h3>Services :</h3>
						@foreach($service_types as $service_type)
							<br><h3>{{$service_type->name}}</h3><br>
							<ul class="checkboxes1" style="columns: 4 8em;">
	                        @foreach($services as $service)
	                        	@if($service->service_type_id == $service_type->id)
	                        	<label>
	                        		<input type="checkbox" name="service_id[]" value="{{$service->id}}" 
	                        		@if(is_array(old('service_id')) && in_array($service->id, old('service_id'))) checked @endif />
	                        		{{$service->name}} (&#8369;{{$service->price}})
	                        	</label>
	                        	@endif
	                        @endforeach 
	                    	</ul>
	                    @endforeach
					</div>

					<div class="row col-lg-12">
						<br>
			  			<button type="submit" class="btn btn-theme">Submit</button>
			  			<a href="{{ route('viewAllReservations') }}" class="btn btn-theme">Back</a>
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