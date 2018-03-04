@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Employee Commissions</h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewEmployeeCommissions-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Employee</th>
							<th>Commission</th>
							<th>Expertise</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						@foreach($employeeCommissions as $employeeCommission)
							@php
								$created_at = date("M jS, Y h:i a", strtotime($employeeCommission->created_at)); 
							@endphp
							<tr>
								<td>{{$employeeCommission->id}}</td>
								<td>{{$employeeCommission->firstname}} {{$employeeCommission->lastname}}</td>
								<td>{{$employeeCommission->commission}}</td>
								<td>{{$employeeCommission->expertise}}</td>
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