@extends('layouts.app')
@include('includes.employee-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>My Infractions/Deductions</h2> 

  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="employeeViewAllInfractions-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Infraction Date</th>
							<th>Type</th>
							<th>Deduction</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						@foreach($infractions as $infraction)
							<tr>
								<td>{{$infraction->id}}</td>
								<td>{{$infraction->date}}</td>
								<td>{{$infraction->type}}</td>
								<td>{{$infraction->deduction}}</td>
								<td>{{$infraction->created_at}}</td>
							</tr>
						@endforeach
					</tbody>
    			</table>

				</div>
    		</div>
  		</div>
	</div>
@stop