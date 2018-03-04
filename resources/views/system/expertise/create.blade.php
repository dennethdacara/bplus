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
	 			<h4>ADD EXPERTISE</h4>
	 			<div class="hline"></div>
	 			<br>
		 			
		 			<form role="form" method="POST" action="{{ route('expertise.store') }}">
                        {{ csrf_field() }}

                        <div class="row clearfix">
                        	<div class="col-lg-6">
								<br><label>Name:</label>
								<input type="name" class="form-control" name="name" id="name" required autofocus placeholder="Expertise Name| Ex: haircut/manicure">

								@if ($errors->has('name'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-6">
								<br><label>Service Fee:</label>
								<input type="number" class="form-control" name="service_fee" id="service_fee" autofocus placeholder="&#8369; Service Fee">

								@if ($errors->has('service_fee'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('service_fee') }}</strong>
                                    </span>
                                @endif
							</div>

						</div>

						<br>
					  	<button type="submit" class="btn btn-theme">Submit</button>
					  	<a href="{{ route('expertise.index') }}" class="btn btn-theme">Back</a>

				</form>

			</div>
	 	</div>
	 </div>

@stop