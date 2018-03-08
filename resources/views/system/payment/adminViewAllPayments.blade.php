@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
		<div class="col-lg-6">
	  		<h2>Reservation Payments</h2> 

	  		<div class="panel panel-default">
	    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
	    			<div class="col-lg-12">
	    			<table class="table table-stripped" id="adminViewAllPayments-table">
						<thead>
							<tr>
								<th>Customer</th>
								<th>Total Amount Due</th>
								<th>Amount Paid</th>
								<th>Change</th>
								<th>Date Added</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payments as $payment)
								<tr>
									<td>{{$payment->customer_firstname}} {{$payment->customer_lastname}}</td>
									<td>&#8369;{{$payment->total_amount}}</td>
									<td>&#8369;{{$payment->amount_paid}}</td>
									<td>&#8369;{{$payment->change}}</td>
									@php
										$date_added = date("M jS, Y h:i a", strtotime($payment->created_at)); 
									@endphp
									<td>{{$date_added}}</td>
								</tr>
							@endforeach
						</tbody>
	    			</table>

					</div>
	    		</div>
	  		</div>
  		</div>

  		<div class="col-lg-6">
	  		<h2>Walk-in Payments</h2> 

	  		<div class="panel panel-default">
	    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
	    			<div class="col-lg-12">
	    			<table class="table table-stripped" id="adminViewAllWalkinPayments-table">
						<thead>
							<tr>
								<th>Customer</th>
								<th>Total Amount Due</th>
								<th>Amount Paid</th>
								<th>Change</th>
								<th>Date Added</th>
							</tr>
						</thead>
						<tbody>
							@foreach($walkinPayments as $walkinPayment)
								<tr>
									<td>{{$walkinPayment->customer_firstname}} {{$walkinPayment->customer_lastname}}</td>
									<td>&#8369;{{$walkinPayment->total_amount}}</td>
									<td>&#8369;{{$walkinPayment->amount_paid}}</td>
									<td>&#8369;{{$walkinPayment->change}}</td>
									@php
										$date_added = date("M jS, Y h:i a", strtotime($walkinPayment->created_at)); 
									@endphp
									<td>{{$date_added}}</td>
								</tr>
							@endforeach
						</tbody>
	    			</table>

					</div>
	    		</div>
	  		</div>
  		</div>
	</div>
@stop