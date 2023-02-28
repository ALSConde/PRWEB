<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Constructor of the class
    public function __construct()
    {
    }

    //Index method
    public function index()
    {
        return view('pages.home');
    }
}
