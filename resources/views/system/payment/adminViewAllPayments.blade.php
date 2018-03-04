@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Payments</h2> 

  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewAllPayments-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Customer</th>
							<th>Total Amount Due</th>
							<th>Amount Paid</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						@foreach($payments as $payment)
							<tr>
								<td>{{$payment->id}}</td>
								<td>{{$payment->customer_firstname}} {{$payment->customer_lastname}}</td>
								<td>&#8369;{{$payment->total_amount}}</td>
								<td>&#8369;{{$payment->amount_paid}}</td>
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
@stop