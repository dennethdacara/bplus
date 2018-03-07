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
	 		<div class="col-lg-12">
	 			<h4>ADD USERS FORM</h4>
	 			<div class="hline"></div>
	 			<br>
		 			
		 			<form role="form" method="POST" action="{{ route('users.store') }}">
                        {{ csrf_field() }}

                        <div class="row clearfix">
                        	<div class="col-lg-4">
								<br><label for="first name">First Name:</label>
								<input type="name" class="form-control" name="firstname" id="firstname" required autofocus placeholder="First Name">

								@if ($errors->has('firstname'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label for="middle name">Middle Name:</label>
								<input type="name" class="form-control" name="middlename" id="middlename" autofocus placeholder="Middle Name">

								@if ($errors->has('middlename'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label for="last name">Last Name:</label>
								<input type="name" class="form-control" name="lastname" id="lastname" autofocus placeholder="Last Name" required>

								@if ($errors->has('lastname'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
							</div>
						
						</div>

						<div class="row clearfix">

							<div class="col-lg-4">
								<br>
								<label>Email:</label>
								<input type="email" class="form-control" name="email" id="email" autofocus placeholder="Email" required>

								@if ($errors->has('email'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br>
								<label>Contact #:</label>
								<input type="number" class="form-control" name="contact_no" id="contact_no" autofocus placeholder="Contact #" required>

								@if ($errors->has('contact_no'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label>Role:</label>
								<select name="role_id" class="form-control" id="createUsersRoleID">
									@foreach($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
				    				@endforeach
				    			</select>

				    			@if ($errors->has('role_id'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
							</div>

						</div>

						<div class="row clearfix">

							<div class="col-lg-4">
								<br>
								<label>Address:</label>
								<textarea name="address" class="form-control" style="" cols="30" rows="5" required></textarea>

								@if ($errors->has('address'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label>Gender:</label>
								<select name="gender" class="form-control">
									<option value="male">Male</option>
									<option value="female">Female</option>
				    			</select>

				    			@if ($errors->has('gender'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4" id="employeeSalary" style="display:none;">
								<br><label>Salary(Monthly):</label>
								<input type="number" min="0" class="form-control" name="employee_salary" id="employee_salary" autofocus placeholder="Employee Salary">

								@if ($errors->has('employee_salary'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('employee_salary') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4" id="employeeExpertise" style="display:none;">
								<br><label>Expertise:</label>
								<select name="expertise_id" id="expertise_id" class="form-control">
										<option value="">Select One</option>
									@foreach($expertise as $expertise1)
										<option value="{{$expertise1->id}}">{{$expertise1->name}} | Service Fee: {{$expertise1->service_fee}}</option>
									@endforeach
				    			</select>

				    			@if ($errors->has('expertise_id'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('expertise_id') }}</strong>
                                    </span>
                                @endif
							</div>
							
                        </div>
		 			
						<br>
					  	<button type="submit" class="btn btn-theme">Submit</button>
					  	<a href="{{ route('users.index') }}" class="btn btn-theme">Back</a>

				</form>

			</div>
	 	</div>
	 </div>

	 



@stop