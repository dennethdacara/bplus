@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Service Types <a href="{{ route('service-type.create') }}" class="btn btn-md btn-primary">Add Service Type</a></h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped">
					<thead>
						<tr>
							<th>#</th>
							<th>Service Type</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($serviceTypes as $serviceType)
						<tr>
							<td>{{$serviceType->id}}</td>
							<td>{{$serviceType->name}}</td>
							<td>{{$serviceType->created_at}}</td>
							<td>
								<form method="POST" action="{{ route('service-type.destroy', ['id' => $serviceType->id]) }}">

									<a href="{{ route('service-type.edit', ['id' => $serviceType->id]) }}" class="btn btn-md btn-primary">Edit</a>

										<input type="hidden" name="_method" value="DELETE">
                                       	<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this service type?');">Delete
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