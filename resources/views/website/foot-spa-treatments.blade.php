@extends('layouts.app')
@include('includes.navbar')

@section('content')

<div class="col-lg-12">
    <h4>FOOTS SPA THREATS</h4>
    <br><br>
        
    <div class="row">
        <div class="col-lg-6">
		    <center>
				<h4>Manicure</h4>
		     	<img src="{{ asset('template/img/footspathreats/manicure.jpg') }}" class="img-responsive" 
		     	style="width:300px;height:300px;">

		     	<p>A manicure is a cosmetic beauty treatment for the fingernails and hands, performed at home or in a nail salon. A manicure consists of filing and shaping of the free edge, pushing (with a cuticle pusher) and clipping (with cuticle nippers) any nonliving tissue (limited to cuticle and hangnails), treatments, massage of the hand, and the application of fingernail polish.</p>
		    </center>
		</div>
		
		<div class="col-lg-6">
			<center>
				<h4>Pedicure</h4>

				<img src="{{ asset('template/img/footspathreats/pedicure.jpg') }}" class="img-responsive"  style="width:300px;height:300px;">

				<p>A pedicure is a superficial cosmetic treatment of the feet and toenails. It provides a similar service to a manicure. Pedicures are done for cosmetic, therapeutic and medical purposes, and can help prevent nail diseases and nail disorders.They are extremely popular throughout the world, primarily among women.
				</p>	
			</center>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6">
			<center>
				<h4>Change Polish</h4>
				<img src="{{ asset('template/img/footspathreats/changepolish.jpg') }}" class="img-responsive"  style="width:300px;height:300px;">
		    	<p>Nail polish is a lacquer that can be applied to the human fingernails or toenails to decorate and ... freshly shaken mixture to give a film that quickly rigidifies. Ultraviolet stabilizers resist color changes when the dry film is exposed to sunlight. 
		    	</p>
			</center>
		</div>
	
		<div class="col-lg-6">
			<center>
				<h4>Gel Polish</h4>
				<img src="{{ asset('template/img/footspathreats/gelpolish.png') }}" class="img-responsive"  style="width:300px;height:300px;">
		         <p>Gelish® Soak-Off Gel Polish applies like polish and cures in a LED lamp in 30 seconds, or 2 minutes in traditional UV lamps. Gelish stays on nails for up to 3 weeks with no chipping or peeling, and soaks completely off in only 10 - 15 minutes.</p>
			</center>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<center>
				<h4>Foot Spa</h4>
				<img src="{{ asset('template/img/footspathreats/footspa.jpg') }}" class="img-responsive"  style="width:300px;height:300px;">
				<p> foot spa is one great way of doing this, reviving your feet and allowing you to concentrate specifically on relaxing them and ensuring they're in great condition. </p>
			</center>
		</div>
	
		<div class="col-lg-6">
			<center>
				<h4>Use Special Polish</h4>
				<img src="{{ asset('template/img/footspathreats/specialpolish.jpg') }}" class="img-responsive"  style="width:300px;height:300px;">
				<p>Konad Special Nail Art Polish is specially formulated (5 times higher in vicosity) to achieve the best results when using our Stamping Nail Art kit.</p>
			</center>
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px;"></div>

</div>

@stop