<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index() {
    	return view ('website/website-index');
    }

    public function about() {
    	return view ('website/about');
    }

    public function footSpaTreatments () {
    	return view ('website/foot-spa-treatments');
    }

    public function hairFashionTreatments () {
    	return view ('website/hair-fashion-treatments');
    }
}
