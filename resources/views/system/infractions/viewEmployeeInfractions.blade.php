@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Employee Infractions <a href="{{ route('createEmployeeInfraction') }}" class="btn btn-md btn-primary">Add Infraction</a> </h2> 

  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewAllReservations-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Employee</th>
							<th>Infraction Date</th>
							<th>Type</th>
							<th>Deduction</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($infractions as $infraction)
							<tr>
								<td>{{$infraction->id}}</td>
								<td>{{$infraction->firstname}}, {{$infraction->lastname}}</td>
								<td>{{$infraction->date}}</td>
								<td>{{$infraction->type}}</td>
								<td>{{$infraction->deduction}}</td>
								<td>{{$infraction->created_at}}</td>
								<td>
									<a href="#" class="btn btn-md btn-primary">Edit</a>
									<a href="{{ route('destroyEmployeeInfraction', ['id' => $infraction->id])}}" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this infraction?');">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
    			</table>

				</div>
    		</div>
  		</div>
	</div>
@stop