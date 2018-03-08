@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Services <a href="{{ route('services.create') }}" class="btn btn-md btn-primary">Add Services</a></h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewAllServices-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Service</th>
							<th>Price</th>
							<th>Service Type</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($services as $service)
						@php
							$created_at = date("M jS, Y h:i a", strtotime($service->created_at)); 
						@endphp
						<tr>
							<td>{{$service->id}}</td>
							<td>{{$service->name}}</td>
							<td>&#8369;{{$service->price}}</td>
							<td>{{$service->service_type}}</td>
							<td>{{$created_at}}</td>
							<td>
								<form method="POST" action="{{ route('services.destroy', ['id' => $service->id]) }}">

									<a href="{{ route('services.edit', ['id' => $service->id]) }}" class="btn btn-md btn-primary">Edit</a>

										<input type="hidden" name="_method" value="DELETE">
                                       	<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this service?');">Delete
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