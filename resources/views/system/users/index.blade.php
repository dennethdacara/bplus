@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Users <a href="{{ route('users.create') }}" class="btn btn-md btn-primary">Add User</a></h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="users-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Gender</th>
							<th>Email</th>
							<th>Address</th>
							<th>Contact #</th>
							<th>User Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->firstname}}</td>
							<td>{{$user->lastname}}</td>
							<td>{{$user->gender}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->address}}</td>
							<td>{{$user->contact_no}}</td>
							<td>{{$user->role_name}}</td>
							<td>
								<form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">

									@if($user->id != Auth::user()->id)

										<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-md btn-primary">Edit</a>

										<input type="hidden" name="_method" value="DELETE">
                                       	<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this user?');">Delete
										</button>

									@endif

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