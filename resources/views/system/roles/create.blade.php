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
	 			<h4>ADD ROLE</h4>
	 			<div class="hline"></div>
	 			<br>
		 			
		 			<form role="form" method="POST" action="{{ route('roles.store') }}">
                        {{ csrf_field() }}

                        <div class="row clearfix">
                        	<div class="col-lg-6">
								<br><label>Role Name:</label>
								<input type="name" class="form-control" name="name" id="name" required autofocus placeholder="Role Name">

								@if ($errors->has('name'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
						
						</div>

						<br>
					  	<button type="submit" class="btn btn-theme">Submit</button>
					  	<a href="{{ route('roles.index') }}" class="btn btn-theme">Back</a>

				</form>

			</div>
	 	</div>
	 </div>

@stop