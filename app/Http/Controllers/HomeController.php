<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getContactForm(){
        return view('form.contact');
    }
}
