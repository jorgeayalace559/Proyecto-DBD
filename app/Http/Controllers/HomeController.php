<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citie;
use App\Seat;

class HomeController extends Controller
{
    
    public function index()
    {
        $citie = Citie::all();
        return view('welcome',['cities'=> $citie]);
    }
}
