<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class CitizenController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function profile()
    {
        return view('users.profile');
    }
}
