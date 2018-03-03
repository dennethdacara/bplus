@extends('layouts.app')
@include('includes.navbar')

@section('content')

<div class="container mtb">
 	<div class="row">
 		<br>
 		<div class="col-lg-6">
 			<img class="img-responsive" src="{{ asset('template/img/front.png') }}" alt="">
 		</div>
 		
 		<div class="col-lg-6">
	 		<h4>Long Description</h4>
	 		<p>Our goal is to tailor the client's experience based on initial interview information, as well as feedback during the treatments, to ensure the client's comfort and satisfaction, and to increase repeat business. We are mindful of the overall experience - using only the finest oils and lotions, beauty treatments and aromatherapies. Special lighting, music, decor, and textiles are used throughout the spa to complete the comfortable, plush environment and enhance the client's overall spa experience. </p>
	 		<h4>Mission</h4>
	 		<p>Our mission is to continue to provide new products, the best brands and salon services at the best prices! Along with a variety of products, we strive on exceptional customer service. We offer in depth product knowledge and an enjoyable friendly salon experience.</p>
 		</div>
 	</div>
</div>

@stop