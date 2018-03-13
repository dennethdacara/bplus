@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Walk-in <a href="{{ route('walk-in.create') }}" class="btn btn-md btn-primary">Add New Walk-in</a></h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="viewAllWalkin-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Services</th>
							<th>Hair stylist</th>
							<th>Walk-in Date</th>
							<th>Walk-in Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($walkins as $walkin)
						<tr>
							<td>{{$walkin->id}}</td>
							<td>{{$walkin->firstname}}</td>
							<td>{{$walkin->lastname}}</td>
							<td>
								@foreach($getServices as $getService)
									@if($walkin->id == $getService->walkin_id)
										{{$getService->name}} (&#8369;{{$getService->price}}) ,
									@endif
								@endforeach
							</td>
							<td>
								@foreach($getAllWalkinEmployees as $getAllWalkinEmployee)
									@if($getAllWalkinEmployee->walkin_id == $walkin->id)
										{{$getAllWalkinEmployee->firstname}} {{$getAllWalkinEmployee->lastname}} 
										({{$getAllWalkinEmployee->expertise}}),
									@endif
								@endforeach
							</td>
							
							@php
								$date_added = date("M jS, Y h:i a", strtotime($walkin->created_at)); 
							@endphp

							<td>{{$date_added}}</td>
							<td>{{$walkin->walkin_time}}</td>
							<td>{{$walkin->status}}</td>
							<td>
								@if($walkin->status != 'Paid')
								<form method="POST" action="{{ route('walk-in.destroy', ['id' => $walkin->id]) }}">
									
									<a href="{{ route('walkinPay', ['walkin_id' => $walkin->id]) }}" class="btn btn-md btn-primary">Pay</a>

									<a href="{{ route('walk-in.edit', ['id' => $walkin->id]) }}" class="btn btn-md btn-primary">Edit</a>

									<input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

									<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('are you sure you want to delete this walk-in?');">Delete
									</button>

								</form>
								@endif
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