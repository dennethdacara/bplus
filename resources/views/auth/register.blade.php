@extends('layouts.app')
@include('includes.navbar')

@section('content')

	<div id="applgreen">
	    <div class="container">
			<div class="row">
				<h3></h3>
			</div>
	    </div>
	</div>

	<div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-8">
	 			<h4>Register Form</h4>
	 			<div class="hline"></div>
	 			<form method="POST" action="{{ route('register') }}">
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
							<br><label>Middle Name:</label>
							<input type="name" class="form-control" @if ($errors->has('middlename')) style="border-color: red;" @endif name="middlename" value="{{ old('middlename') }}" autofocus placeholder="Middle Name">

							@if ($errors->has('middlename'))
                                <strong>{{ $errors->first('middlename') }}</strong>
                            @endif
						</div>

					</div>


					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Last Name:</label>
							<input type="name" class="form-control" @if ($errors->has('lastname')) style="border-color: red;" @endif name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Last Name">

							@if ($errors->has('lastname'))
                                <strong>{{ $errors->first('lastname') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Contact:</label>
							<input type="number" class="form-control" @if ($errors->has('contact_no'))
							style="border-color: red;" @endif name="contact_no" value="{{ old('contact_no') }}" required placeholder="Your Contact number">

							@if ($errors->has('contact_no'))
                                <strong>{{ $errors->first('contact_no') }}</strong>
                            @endif
						</div>

					</div>


					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Email:</label>
							<input id="email" type="email" class="form-control" @if ($errors->has('email')) 
							style="border-color: red;" @endif name="email" value="{{ old('email') }}" required>

							@if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Gender: </label>
							<select name="gender" class="form-control" @if ($errors->has('gender')) style="border-color: red;" @endif>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>

							@if ($errors->has('gender'))
                               	<strong>{{ $errors->first('gender') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Password:</label>
							
							<input id="password" type="password" class="form-control" @if ($errors->has('password')) 
							style="border-color: red;" @endif name="password" required>

							@if ($errors->has('password')) 
								<strong>{{ $errors->first('password') }}</strong> 
							@endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Confirm Password:</label>
							<input id="password-confirm" type="password" class="form-control" @if ($errors->has('password')) 
							style="border-color: red;" @endif name="password_confirmation" required>

						</div>

					</div>

					<div class="row">

						<div class="col-lg-12 col-md-6">
							<br><label>Address: </label>
							<textarea name="address" style="resize:vertical;" @if ($errors->has('address')) style="border-color: red;" @endif cols="30" rows="3" class="form-control"
							placeholder="Your address" title="Please enter your address">{{ old('address') }}</textarea>

							@if ($errors->has('address'))
                                <strong>{{ $errors->first('address') }}</strong>
                            @endif
						</div>

	 				</div>

					<div class="row col-lg-12">
						<br>
			  			<button type="submit" name="submit" class="btn btn-theme">Register</button>
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