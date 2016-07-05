<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function mainPage() {
        $cars = Car::all()->toArray();
        return view('welcome')->with(["cars" => $cars]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
