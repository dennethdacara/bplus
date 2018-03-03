@extends('layouts.app')
@include('includes.navbar')

@section('content')

<div id="headerwrap">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-4">
				<form role="form" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-lg-6">
						<div>
							<label>Email:</label>
							<input type="email" class="form-control" name = "email" id="email" required autofocus placeholder="Email Address">
						</div>

						<div>
							<br>
							<label>Password:</label>
							<input type="password" class="form-control" name = "password" id="password" required placeholder="Password">
						</div><br>

						<div class="col-lg-12">
						<input type="submit" name="submit" value="Log In" class="button btn btn-sm btn-block ">
						</div>
					</div>	
				</form>			
			</div>		
		</div>
    </div>
</div>


@stop