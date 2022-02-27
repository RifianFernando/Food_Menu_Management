<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userPage(){
        return view('userPage');
    }

    public function adminDashboard(){
        return view('adminDashboard');
    }
}
