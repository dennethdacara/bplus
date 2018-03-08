@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>Employee Salary</h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewEmployeeSalary-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Employee</th>
							<th>Expertise</th>
							<th>Salary(Monthly)</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($employee_salary as $employee_salary1)
						@php
							$created_at = date("M jS, Y h:i a", strtotime($employee_salary1->created_at)); 
						@endphp
						<tr>
							<td>{{$employee_salary1->salary_id}}</td>
							<td>{{$employee_salary1->firstname}} {{$employee_salary1->lastname}}</td>
							<td>{{$employee_salary1->expertise}}</td>
							<td>&#8369;{{$employee_salary1->employee_salary}}</td>
							<td>{{$created_at}}</td>
							<td>
								<a href="{{ route('salary.edit', ['id' => $employee_salary1->salary_id]) }}" class="btn btn-md btn-primary">Edit Employee Salary</a>
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