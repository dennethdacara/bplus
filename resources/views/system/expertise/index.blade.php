@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Expertise <a href="{{ route('expertise.create') }}" class="btn btn-md btn-primary">Add Expertise</a></h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#384452;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewAllExpertise-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Service Fee</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($expertise as $expertise1)
							<tr>
								<td>{{$expertise1->id}}</td>
								<td>{{$expertise1->name}}</td>
								<td>&#8369;{{$expertise1->service_fee}}</td>
								<td>{{$expertise1->created_at}}</td>
								<td>
									<form method="POST" action="{{ route('expertise.destroy', ['id' => $expertise1->id]) }}">

									<a href="{{ route('expertise.edit', ['id' => $expertise1->id]) }}" class="btn btn-md btn-primary">Edit</a>

									<input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

									<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this expertise?');">Delete
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