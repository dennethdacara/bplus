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
	<br><br>

	<div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-8">
	 			<h4>Walk-in Form</h4>
	 			<div class="hline"></div>
	 			<form role="form" method="POST" action="{{ route('walk-in.update', ['id' => $walkin->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                	{{ csrf_field() }}

	 				<div class="row"><br>

						<div class="col-lg-6 col-md-6">
							<br><label>First Name:</label>
							<input type="name" class="form-control" @if ($errors->has('firstname')) 
							style="border-color: red;" @endif name="firstname" value="{{ $walkin->firstname }}" 
							required autofocus>

							@if ($errors->has('firstname'))
                                <strong>{{ $errors->first('firstname') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Last Name:</label>
							<input type="name" class="form-control" @if ($errors->has('lastname')) style="border-color: red;" @endif name="lastname" value="{{ $walkin->lastname }}" required>

							@if ($errors->has('lastname'))
                                <strong>{{ $errors->first('lastname') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Contact:</label>
							<input type="contact" class="form-control" @if ($errors->has('contact_no'))style="border-color: red;" @endif name="contact_no" value="{{ $walkin->contact_no }}" required>

							@if ($errors->has('contact_no'))
                                <strong>{{ $errors->first('contact_no') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Email:</label>
							<input id="email" type="email" class="form-control" @if ($errors->has('email')) 
							style="border-color: red;" @endif name="email" value="{{ $walkin->email }}" required>

							@if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                            @endif
						</div>

					</div>


					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Hair Stylist:</label>
							<select name="employee_id[]" class="selectpicker form-control" id="multiHairstylistEdit" multiple data-live-search="true" multiple data-selected-text-format="count > 1">
								@foreach($hairstylists as $hairstylist)
									<option value="{{$hairstylist->id}}"
										{{in_array($hairstylist->id, $employee_walkin_pivot) ? 'selected' : ''}}
										>{{$hairstylist->firstname}} | {{$hairstylist->expertise}}</option>
								@endforeach
							</select>

							@if ($errors->has('employee_id'))
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Time:</label>
							<select name="walkin_time" class="form-control">
								<option value="07:00 - 07:30 AM" @if($walkin->walkin_time == '07:00 - 07:30 AM') selected @endif>
								07:00 - 07:30 AM</option>
								<option value="07:30 - 08:00 AM" @if($walkin->walkin_time == '07:30 - 08:00 AM') selected @endif>
								07:30 - 08:00AM</option>
								<option value="08:00 - 08:30 AM" @if($walkin->walkin_time == '08:00 - 08:30 AM') selected @endif>
								08:00 - 08:30AM</option>
								<option value="08:30 - 09:00 AM" @if($walkin->walkin_time == '08:30 - 09:00 AM') selected @endif>
								08:30 - 09:00AM</option>
								<option value="09:00 - 09:30 AM" @if($walkin->walkin_time == '09:00 - 09:30 AM') selected @endif>
								09:00 - 09:30AM</option>
								<option value="09:30 - 10:00 AM" @if($walkin->walkin_time == '09:30 - 10:00 AM') selected @endif>
								09:30 - 10:00AM</option>
								<option value="10:00 - 10:30 AM" @if($walkin->walkin_time == '10:00 - 10:30 AM') selected @endif>
								10:00 - 10:30AM</option>
								<option value="10:30 - 11:00 AM" @if($walkin->walkin_time == '10:30 - 11:00 AM') selected @endif>
								10:30 - 11:00AM</option>
								<option value="11:00 - 11:30 AM" @if($walkin->walkin_time == '11:00 - 11:30 AM') selected @endif>
								11:00 - 11:30AM</option>
								<option value="11:30 AM - 12:00 PM" @if($walkin->walkin_time == '11:30 AM - 12:00 PM') selected @endif>
								11:30AM - 12:00PM</option>
								<option value="12:00 - 12:30 PM" @if($walkin->walkin_time == '12:00 - 12:30 PM') selected @endif>
								12:00 - 12:30PM</option>
								<option value="12:30 - 1:00 PM" @if($walkin->walkin_time == '12:30 - 1:00 PM') selected @endif>
								12:30 - 1:00PM</option>
								<option value="1:00 - 1:30 PM" @if($walkin->walkin_time == '1:00 - 1:30 PM') selected @endif>
								1:00 - 1:30PM</option>
								<option value="1:30 - 2:00 PM" @if($walkin->walkin_time == '1:30 - 2:00 PM') selected @endif>
								1:30 - 2:00PM</option>
								<option value="2:00 - 2:30 PM" @if($walkin->walkin_time == '2:00 - 2:30 PM') selected @endif>
								2:00 - 2:30PM</option>
								<option value="2:30 - 3:00 PM" @if($walkin->walkin_time == '2:30 - 3:00 PM') selected @endif>
								2:30 - 3:00PM</option>
								<option value="3:00 - 3:30 PM" @if($walkin->walkin_time == '3:00 - 3:30 PM') selected @endif>
								3:00 - 3:30PM</option>
								<option value="3:30 - 4:00 PM" @if($walkin->walkin_time == '3:30 - 4:00 PM') selected @endif>
								3:30 - 4:00PM</option>
								<option value="4:00 - 4:30 PM" @if($walkin->walkin_time == '4:00 - 4:30 PM') selected @endif>
								4:00 - 4:30PM</option>
								<option value="4:30 - 5:00 PM" @if($walkin->walkin_time == '4:30 - 5:00 PM') selected @endif>
								4:30 - 5:00PM</option>
								<option value="5:00 - 5:30 PM" @if($walkin->walkin_time == '5:00 - 5:30 PM') selected @endif>
								5:00 - 5:30PM</option>
								<option value="5:30 - 6:00 PM" @if($walkin->walkin_time == '5:30 - 6:00 PM') selected @endif>
								5:30 - 6:00PM</option>
								<option value="6:00 - 6:30 PM" @if($walkin->walkin_time == '6:00 - 6:30 PM') selected @endif>
								6:00 - 6:30PM</option>
								<option value="6:30 - 7:00 PM" @if($walkin->walkin_time == '6:30 - 7:00 PM') selected @endif>
								6:30 - 7:00PM</option>
								<option value="7:00 - 7:30 PM" @if($walkin->walkin_time == '7:00 - 7:30 PM') selected @endif>
								7:00 - 7:30PM</option>
								<option value="7:30 - 8:00 PM" @if($walkin->walkin_time == '7:30 - 8:00 PM') selected @endif>
								7:30 - 8:00PM</option>
							</select>

							@if ($errors->has('walkin_time'))
                                <strong>{{ $errors->first('walkin_time') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row col-lg-12">
						@php
							$service_pivot = App\ServiceWalkin::where('walkin_id', $walkin->id)->pluck('service_id')->toArray();
						@endphp

						<br><label>Services :</label><br>
						<ul class="checkboxes1" style="columns: 4 8em;">
                        @foreach($services as $service)
                        	<label>
                        		<input type="checkbox" name="service_id[]" value="{{$service->id}}" 
                        		{{in_array($service->id, $service_pivot) ? 'checked' : ''}} />
                        		{{$service->name}} (&#8369;{{$service->price}})
                        	</label>
                        @endforeach
                    	</ul>
					</div>

					<div class="row col-lg-12">
						<br>
			  			<button type="submit" class="btn btn-theme">Update</button>
			  			<a href="{{ route('walk-in.index') }}" class="btn btn-theme">Back</a>
			  		</div>
					
				</form>
			</div>
	 		
	 		<div class="col-lg-4">
		 		<h4>Our Address</h4>
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