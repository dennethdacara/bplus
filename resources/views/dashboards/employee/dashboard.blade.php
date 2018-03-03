@extends('layouts.app')
@include('includes.employee-navbar')

@section('content')
    
    <br><br><br>
	<div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <img src="{{ asset('template/img/logo2.png') }}" class="img-responsive">     
                </div>
                <div class="col-lg-8 col-lg-offset-2 himg">
                    <h3>We are the Beauty Plus Salon 
                    	<br><br>We Want to Make Your Life Beautiful 
                		#FOREVERYOUNG
                    </h3>
                </div>
            </div>
        </div>
	</div>

@stop