<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        echo 'selamat datang';
    }

    public function dashboard(){
        $clubs = Club::latest()->get();
        return view('auth.dashboard', compact('clubs'));
    }
}
