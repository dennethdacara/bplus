@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')
	<br><br>
	<div class="container mtb">
  		<h2>View All Employee Commissions</h2> 
  		<div class="panel panel-default">
    		<div class="panel-body" style="background:#999999c7;overflow-x:auto;">
    			<div class="col-lg-12">
    			<table class="table table-stripped" id="adminViewEmployeeCommissions-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Employee</th>
							<th>Services Provided/Involved</th>
							<!-- <th>Total Amount</th> -->
							<th>Commission</th>
							<!-- <th>Expertise</th> -->
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>
						@foreach($employeeCommissions as $employeeCommission)
							@php
								$created_at = date("M jS, Y h:i:s a", strtotime($employeeCommission->created_at)); 
							@endphp
							<tr>
								<td>{{$employeeCommission->commission_employee_id}}</td>
								<td>{{$employeeCommission->firstname}} {{$employeeCommission->lastname}}</td>
								<td> 
									@foreach($getAllServices as $getAllService)
										@if($getAllService->commission_id == $employeeCommission->id)
											{{$getAllService->service_name}} (&#8369;{{$getAllService->price}}),
										@endif
									@endforeach
								</td>
								<!-- <td> -->
									<!-- foreach($getTotalAmountServices as $getTotalAmountService)
										php 
											/*$finalTotal = $getTotalAmountService->total + $employeeCommission->service_fee;*/
										endphp
									
										if ($getTotalAmountService->commission_id == $employeeCommission->id)
											&#8369;$getTotalAmountService->total}}(services total) + &#8369;$employeeCommission->service_fee}}(service fee) = &#8369;$finalTotal}}(total amount)
										endif
									
									endforeach -->
								<!-- </td> -->
								<td>&#8369;{{$employeeCommission->commission}} ({{$percentage}}% of total amount) </td>
								<!-- <td>$employeeCommission->expertise}}</td> -->
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