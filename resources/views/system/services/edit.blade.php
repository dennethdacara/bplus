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
	 			<h4>EDIT SERVICE</h4>
	 			<div class="hline"></div>
	 			<br>
		 			
		 			<form role="form" method="POST" action="{{ route('services.update', ['id' => $service->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	{{ csrf_field() }}

                        <div class="row clearfix">
                        	<div class="col-lg-6">
								<br><label>Service Name:</label>
								<input type="name" class="form-control" name="name" id="name" required autofocus value="{{$service->name}}">

								@if ($errors->has('name'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-6">
								<br><label>Service Type:</label>
								<select name="service_type_id" class="form-control">
									@foreach($serviceTypes as $serviceType)
										<option value="{{$serviceType->id}}"
											@if($serviceType->id == $service->service_type_id) selected @endif
											>{{$serviceType->name}}</option>
				    				@endforeach
				    			</select>

				    			@if ($errors->has('service_type_id'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('service_type_id') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-6">
								<br><label>Price:</label>
								<input type="number" class="form-control" name="price" id="price" autofocus value="{{$service->price}}">

								@if ($errors->has('price'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="col-lg-6">
								<br><label>Expertise Type:</label>
								<select name="expertise_id" class="form-control">
									@foreach($expertise as $expertise1)
										<option value="{{$expertise1->id}}"
											@if($expertise1->id == $service->expertise_id) selected @endif
											>{{$expertise1->name}}</option>
				    				@endforeach
				    			</select>

				    			@if ($errors->has('expertise_id'))
                                    <span class="help-info">
                                        <strong>{{ $errors->first('expertise_id') }}</strong>
                                    </span>
                                @endif
							</div>

							
						
						</div>

						<br>
					  	<button type="submit" class="btn btn-theme">Update</button>
					  	<a href="{{ route('services.index') }}" class="btn btn-theme">Back</a>

				</form>

			</div>
	 	</div>
	 </div>

@stop