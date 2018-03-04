@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Employees <a href="{{ route('employees.create') }}" class="btn btn-md btn-primary">Add Employee</a></h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="employees-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Gender</th>
							<th>Email</th>
							<th>Address</th>
							<th>Contact #</th>
							<th>Expertise</th>
							<th>User Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($employees as $employee)
						<tr>
							<td>{{$employee->id}}</td>
							<td>{{$employee->firstname}}</td>
							<td>{{$employee->lastname}}</td>
							<td>{{$employee->gender}}</td>
							<td>{{$employee->email}}</td>
							<td>{{$employee->address}}</td>
							<td>{{$employee->contact_no}}</td>
							<td>{{$employee->expertise}}</td>
							<td>{{$employee->role_name}}</td>
							<td>
								<form method="POST" action="{{ route('employees.destroy', ['id' => $employee->id]) }}">

									<a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-md btn-primary">Edit</a>

									<input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

									<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this employee?');">Delete
									</button>

								</form>
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