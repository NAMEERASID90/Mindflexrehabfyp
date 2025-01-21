<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorloginController extends Controller
{
    public function doctor(){
       
        return view('doctor.doctorlogin');
    }
    
}