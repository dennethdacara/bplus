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
	 			<h4>ADD SERVICE</h4>
	 			<div class="hline"></div>
	 			<br>
		 			
		 			<form role="form" method="POST" action="{{ route('services.store') }}">
                        {{ csrf_field() }}

                        <div class="row clearfix">
                        	<div class="col-lg-12">
								<br><label>Service Name:</label>
								<input type="name" class="form-control" name="name" id="name" required autofocus placeholder="Service Name">

								@if ($errors->has('name'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-6">
								<br><label>Price:</label>
								<input type="number" class="form-control" name="price" id="price" autofocus placeholder="Price">

								@if ($errors->has('price'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-6">
								<br><label>Service Type:</label>
								<select name="service_type_id" class="form-control">
									@foreach($serviceTypes as $serviceType)
										<option value="{{$serviceType->id}}">{{$serviceType->name}}</option>
				    				@endforeach
				    			</select>

				    			@if ($errors->has('service_type_id'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('service_type_id') }}</strong>
                                    </span>
                                @endif
							</div>
						
						</div>

						<br>
					  	<button type="submit" class="btn btn-theme">Submit</button>
					  	<a href="{{ route('services.index') }}" class="btn btn-theme">Back</a>

				</form>

			</div>
	 	</div>
	 </div>

@stop