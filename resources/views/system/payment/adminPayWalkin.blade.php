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
	 			<h4>Walk-in Payment</h4>
	 			<div class="hline"></div>
	 			<form role="form" method="POST" action="{{ route('walkinPayStore') }}">
                   	{{ csrf_field() }}
					<div class="row">

						<input type="hidden" name="walkin_id" value="{{$getTotalAmountDue[0]->walkin_id}}">

					<div class="col-lg-12">
						<br>
						<h3>Total Amount Due: P{{$getTotalAmountDue[0]->total}}</h3>

						<input type="hidden" name="totalAmountDue" value="{{$getTotalAmountDue[0]->total}}">

					</div>
		 			<div class="col-lg-6 col-md-6">
							<br><h4>Enter Amount:</h4>
							<input type="number" class="form-control" @if ($errors->has('amount_paid')) 
							style="border-color: red;" @endif name="amount_paid" value="{{ old('amount_paid') }}" required autofocus placeholder="Enter exact amount">

							@if ($errors->has('amount_paid'))
                                <strong>{{ $errors->first('amount_paid') }}</strong>
                            @endif
					</div>

					<div class="col-lg-12">
						<br>
			  			<button type="submit" class="btn btn-md btn-primary">PAY</button>
			  			<a href="{{ route('walk-in.index') }}" class="btn btn-md btn-theme">BACK</a>
			  		</div>
				</div>
			</form>
	 				
			</div>
	 		
	 		
	 	</div>
	 </div>


@stop