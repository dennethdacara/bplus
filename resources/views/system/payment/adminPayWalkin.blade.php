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

	 				<div class="row"><br>
	 					<span>
						<h3>Availed Services : </h3>
						</span>

						<div class="panel panel-default">
				    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
				    			<div class="col-lg-12">
				    				<table class="table table-stripped" id="adminPayWalkinBilling-table">
									<thead>
										<tr>
											<th>Service</th>
											<th>Price</th>
											<th>Date Added</th>
										</tr>
									</thead>
									<tbody>
										@foreach($getAllWalkinServices as $getAllWalkinService)
											<tr>
												<td>{{$getAllWalkinService->service_name}}</td>
												<td>&#8369;{{$getAllWalkinService->price}}</td>
												<td>{{$getAllWalkinService->created_at}}</td>
											</tr>
										@endforeach
									</tbody>
				    				</table>

								</div>
				    		</div>
    					</div>

    				</div>
			</div>

	 		<div class="col-lg-4">
	 			<h4>Payable</h4>
	 			<div class="hline"></div>
					<div class="row">

						<input type="hidden" name="walkin_id" value="{{$getTotalAmountDue[0]->walkin_id}}">
						<input type="hidden" name="customer_firstname" value="{{$getCustomerDetails->firstname}}">
						<input type="hidden" name="customer_lastname" value="{{$getCustomerDetails->lastname}}">

						@php 
							//Convert our percentage value into a decimal.
	        				$percentageInDecimal = $vat->percentage / 100;
	        				$totalVatPayable = $percentageInDecimal * $getTotalAmountDue[0]->total;

	        				//vat inclusive
	        				$vat1 = 1+($vat->percentage/100);
							$vatIncl = $getTotalAmountDue[0]->total / $vat1;
							$vat2 = $vatIncl + ($vatIncl * .12);
						@endphp

					<div class="col-lg-12">
						<br>
						<h4>Customer: {{ ucwords($getCustomerDetails->firstname) }} {{ ucwords($getCustomerDetails->lastname) }}</h4>
						<h4>HairStylist/s:
							@foreach($getAllEmployeeWalkin as $getAllEmployeeWalkin1)
								<li>{{$getAllEmployeeWalkin1->firstname}} {{$getAllEmployeeWalkin1->lastname}} 
									({{$getAllEmployeeWalkin1->expertise}})</li>
							@endforeach
						</h4>

						<h4>Untaxed Amt: &#8369;{{ round($vatIncl) }}</h4>

						<h4>Taxed Amt: &#8369;{{ $vat2 }} </h4>

						<h4>Vat (Inclusive): {{$vat->percentage}}%)</h4>

						<h4>Amount Due: &#8369;{{$getTotalAmountDue[0]->total}}</h4>
						
						<h4>Total Service Fee: &#8369;{{$sumEmployeeWalkinServiceFee->totalServiceFee}}</h4>
						
						<h3>Total Amount Due: <span style="color:red;">&#8369;{{$getTotalAmountDue[0]->total + $sumEmployeeWalkinServiceFee->totalServiceFee}}</span></h3>

						<input type="hidden" name="totalAmountDue" value="{{$getTotalAmountDue[0]->total + $sumEmployeeWalkinServiceFee->totalServiceFee}}">

						<!-- <input type="text" name="employee_id" value="$getTotalAmountDue[0]->employee_id}}"> -->

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
	 				
			</div>
	 		
	 		
	 	</div>
	 </div>


@stop