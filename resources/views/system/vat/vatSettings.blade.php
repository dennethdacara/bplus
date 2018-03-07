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
	 		<div class="col-lg-6">
	 			<h4>Vat Settings</h4>
	 			<div class="hline"></div>
	 			<form role="form" method="POST" action="{{ route('updateVatSettings') }}">
                   	{{ csrf_field() }}

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Percentage(%):</label>
							<input type="number" min="0" max="100" name="percentage" 
							value="{{$currentVatSettings->percentage}}" class="form-control">

							@if ($errors->has('percentage'))
                                <strong>{{ $errors->first('percentage') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row col-lg-12">
						<br>
			  			<button type="submit" class="btn btn-theme">Update</button>
			  			<a href="{{ route('adminDashboard') }}" class="btn btn-theme">Back</a>
			  		</div>
					
				</form>
			</div>
	 	
	 	</div>
	 </div>


@stop