<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testimonalsController extends Controller
{
    public function testimonals(){
       
        return view('testimonals.testimonial');
    }
}
