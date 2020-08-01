<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){
        
    }
    
    public function index(Request $request)
    {
        return view('revista.registro.login');
    }
}
