@extends('layouts.app')
@include('includes.employee-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>My Commissions</h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="employeeViewAllCommissions-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Services Provided</th>
							<th>Total Amount</th>
							<th>Commission</th>
							<th>Expertise</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						@foreach($myCommissions as $myCommission)
							@php
								$created_at = date("M jS, Y h:i a", strtotime($myCommission->created_at)); 
							@endphp
							<tr>
								<td>{{$myCommission->id}}</td>
								<td> 
									@foreach($getAllServices as $getAllService)
										@if($getAllService->commission_id == $myCommission->id)
											{{$getAllService->service_name}} (&#8369;{{$getAllService->price}}),
										@endif
									@endforeach
								</td>
								<td>
									@foreach($getTotalAmountServices as $getTotalAmountService)
										@php 
											$finalTotal = $getTotalAmountService->total + $myCommission->service_fee;
										@endphp

										@if($getTotalAmountService->commission_id == $myCommission->id)
											&#8369;{{$getTotalAmountService->total}}(services total) + &#8369;{{$myCommission->service_fee}}(service fee) = &#8369;{{$finalTotal}}(total amount)
										@endif

									@endforeach
								</td>
								<td>{{$myCommission->commission}} ({{$percentage}}% of total amount)</td>
								<td>{{$myCommission->expertise}}</td>
								<td>{{$created_at}}</td>
							</tr>
						@endforeach
					</tbody>
    			</table>
				</div>
    		</div>
  		</div>
	</div>
@stop