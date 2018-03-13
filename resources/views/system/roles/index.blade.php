@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
		<div class="col-lg-6">
	  		<h2>View All Roles <a href="{{ route('roles.create') }}" class="btn btn-md btn-primary">Add Role</a></h2> 
	  		<div class="panel panel-default">
	    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
	    			<div class="col-lg-12">
	    			<table class="table table-stripped" id="roles-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Date Added</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $role)
							@php
								$created_at = date("M jS, Y h:i a", strtotime($role->created_at)); 
							@endphp
							<tr>
								<td>{{$role->name}}</td>
								<td>{{$created_at}}</td>
								<td>
									<form method="POST" action="{{ route('roles.destroy', ['id' => $role->id]) }}">

										<a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-md btn-primary">Edit</a>

											<input type="hidden" name="_method" value="DELETE">
	                                       	<input type="hidden" name="_token" value="{{ csrf_token() }}">

											<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this role?');">Delete
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
	</div>
@stop