@extends('layouts.app')
@include('includes.navbar')

@section('content')

<div class="col-lg-12">
    <h4>Hair Fashion treatments</h4>
    <br><br>
	

	<div class="col-lg-6">
		<center>
		   	<h4>Hair Cut</h4>
		   	<img src="{{ asset('template/img/hairfashion/haircut.jpg') }}" class="img-responsive"  
		   	style="width:300px;height:300px;"> 
		   	<p>the style in which a person's hair is cut.</p>
		</center>
	</div>

	<div class="col-lg-6">
		<center>
		   	<h4>Hair Blower & Ironing</h4>
		   	<img src="{{ asset('template/img/hairfashion/hairblowerironing.jpg') }}" class="img-responsive"  style="width:300px;height:300px;">

		   	<p>A blow dryer or hair dryer is an electromechanical device designed to blow normal or hot air over damp hair, in order to accelerate the evaporation of water particles and dry the hair. Blow dryers allow better control over the shape and style of hair, by accelerating and controlling the formation of temporary hydrogen bonds inside each strand. These hydrogen bonds are very powerful (allowing for stronger hair shaping than even the sulfur bonds formed by permanent waving products), but are temporary and extremely vulnerable to humidity. They disappear with a single washing of the hair.</p>
		</center>
	</div>

	<div class="col-lg-6">
		<center>
			<h4>Hair Color & Highlights</h4>
			<img src="{{ asset('template/img/hairfashion/haircolor.jpg') }}" class="img-responsive" 
			style="width:300px;height:300px;">
			<p>Hair coloring is the practice of changing the hair color. The main reasons for this are cosmetic: to cover gray hair, to change to a color regarded as more fashionable or desirable, to restore the original hair color after it has been discolored by hairdressing processes or sun bleaching.</p>
		</center>
	</div>

	<div class="col-lg-6">
		<center>
	    	<h4>Hot Oil</h4>
	    	<img src="{{ asset('template/img/hairfashion/hotoil.jpg') }}" class="img-responsive"  
	    	style="width:300px;height:300px;">
	    	<p>A hot oil treatment is a type of body or hair massage therapy for relaxation and healing purposes. For the body, the hot oil is used to loosen and release the internal impurities, which are then flushed out and eliminated through the urinary and digestive tract. For this reason it is important to drink plenty of water after a treatment.</p>
    	</center>   
	</div>
	
	<div class="col-lg-6">
		<center>
	    	<h4>Keratin</h4>
	    	<img src="{{ asset('template/img/hairfashion/keratin.jpg') }}" class="img-responsive"  
	    	style="width:300px;height:300px;">
	    	<p> Keratin Complex Smoothing Therapy is different. Conventional straighteners or relaxers may break the protein bonds within the hair’s structure, causing each strand to reform into a permanently straight shape.</p>
    	</center>
	</div>
	
	<div class="col-lg-6">
		<center>
			<h4>Cellophane</h4>
			<img src="{{ asset('template/img/hairfashion/cellophane.jpg') }}" class="img-responsive"  
			style="width:300px;height:300px;">
			<p>The “cellophane” treatment being referred to is actually a semi-permanent color service that uses no pigment in the hair color formula. Instead clear glossing agents are used which get deposited into the hair adding substance and shine by filling and plumping the shaft and sealing the cuticle layer.</p>
		</center>
	</div>

	<div class="col-lg-6">
		<center>
			<h4>Hair and Make up</h4>
			<img src="{{ asset('template/img/hairfashion/hairmakeup.jpg') }}" class="img-responsive"  
			style="width:300px;height:300px;">
			<p>Make-up and Hair Artists create make-ups and hairstyles to meet production requirements and oversee make-up and hair continuity during filming. Make-up and Hair Artists create make-ups and hairstyles to meet production requirements and oversee make-up and hair continuity during filming.
			</p>
		</center>
	</div>

	<div class="col-lg-6">
		<center>
			<h4>Hair Color & Treatment</h4>
			<img src="{{ asset('template/img/hairfashion/haircolotreatment.jpg') }}" class="img-responsive"  
			style="width:300px;height:300px;">
			<p>Hair coloring is the practice of changing the hair color. The main reasons for this are cosmetic: to cover gray hair, to change to a color regarded as more fashionable or desirable, to restore the original hair color after it has been discolored by hairdressing processes or sun bleaching.</p>
		</center>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100px;"></div>

</div>  




@stop