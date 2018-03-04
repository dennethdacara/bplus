@extends('layouts.app')
@include('includes.employee-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>My Commissions</h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="employeeViewAllCommissions-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Commission</th>
							<th>Expertise</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						@foreach($myCommissions as $myCommission)
							@php
								$created_at = date("M jS, Y h:i a", strtotime($myCommission->created_at)); 
							@endphp
							<tr>
								<td>{{$myCommission->id}}</td>
								<td>{{$myCommission->commission}}</td>
								<td>{{$myCommission->expertise}}</td>
								<td>{{$created_at}}</td>
							</tr>
						@endforeach
					</tbody>
    			</table>
				</div>
    		</div>
  		</div>
	</div>
@stop