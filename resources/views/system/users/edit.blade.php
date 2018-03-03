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
	 			<h4>UPDATE USER: {{$user->firstname}}, {{$user->lastname}}</h4>
	 			<div class="hline"></div>
	 			<br>
		 			
		 			<form role="form" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	{{ csrf_field() }}

                        <div class="row clearfix">
                        	<div class="col-lg-4">
								<br><label for="first name">First Name:</label>
								<input type="name" class="form-control" name="firstname" id="firstname" 
								value="{{$user->firstname}}" required autofocus>

								@if ($errors->has('firstname'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label for="middle name">Middle Name:</label>
								<input type="name" class="form-control" name="middlename" id="middlename" autofocus value="{{$user->middlename}}">

								@if ($errors->has('middlename'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label for="last name">Last Name:</label>
								<input type="name" class="form-control" name="lastname" id="lastname" autofocus value="{{$user->lastname}}" required>

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
								<input type="email" class="form-control" name="email" id="email" autofocus 
								value="{{$user->email}}" required>

								@if ($errors->has('email'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br>
								<label>Contact #:</label>
								<input type="contact" class="form-control" name="contact_no" id="contact_no" autofocus
								value="{{$user->contact_no}}" required>

								@if ($errors->has('contact_no'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label>Role:</label>
								<select name="role_id" class="form-control">
									@foreach($roles as $role)
										<option value="{{$role->id}}" 
											@if($role->id == $user->role_id) selected @endif>
											{{$role->name}}
										</option>
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
								<textarea name="address" class="form-control" style="" cols="30" rows="3" required>{{$user->address}}</textarea>

								@if ($errors->has('address'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-4">
								<br><label>Gender:</label>
								<select name="gender" class="form-control">
									<option value="male"
										@if($user->gender == 'male') selected @endif>Male</option>
									<option value="female"
										@if($user->gender == 'female') selected @endif>Female</option>
				    			</select>

				    			@if ($errors->has('gender'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
							</div>
							
                        </div>
		 			
						<br>
					  	<button type="submit" class="btn btn-theme">Update</button>
					  	<a href="{{ route('users.index') }}" class="btn btn-theme">Back</a>

				</form>

			</div>
	 	</div>
	 </div>

@stop