@extends('layouts.app')
@include('includes.admin-navbar')

@section('content')

	<div id="applgreen">
	    <div class="container">
			<div class="row">
				<h3></h3>
			</div>
	    </div>
	</div>
	<br>

	<div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-8">
	 			<h4>Add Employee Infraction</h4>
	 			<div class="hline"></div>
	 			<form role="form" method="POST" action="{{ route('storeEmployeeInfraction') }}">
                   	{{ csrf_field() }}

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Hair Stylist/Employee:</label>
							<select name="employee_id" class="selectpicker form-control" id="multiHairstylist" data-live-search="true">
								@foreach($employees as $employee)
									<option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}</option>
								@endforeach
							</select>

							@if ($errors->has('employee_id'))
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            @endif
						</div>
						
						<div class="col-lg-6 col-md-6">
							<br><label>Infraction Date:</label>
							<input type="text" id="addHomeReservation" name="date" value="{{old('date')}}" class="form-control" placeholder="Please choose a date..." readonly="true">
						</div>

					</div>

					<div class="row">

						<div class="col-lg-6 col-md-6">
							<br><label>Type:</label>
							<select name="type" class="form-control">
								<option value="Absent">Absent</option>
							</select>

							@if ($errors->has('type'))
                                <strong>{{ $errors->first('type') }}</strong>
                            @endif
						</div>

						<div class="col-lg-6 col-md-6">
							<br><label>Deduction:</label>
							<input type="text" name="deduction" class="form-control" value="113" readonly>

							@if ($errors->has('deduction'))
                                <strong>{{ $errors->first('deduction') }}</strong>
                            @endif
						</div>

					</div>

					<div class="row col-lg-12">
						<br>
			  			<button type="submit" class="btn btn-theme">Submit</button>
			  		</div>
					
				</form>
			</div>
	 		
	 		
	 	</div>
	 </div>


@stop