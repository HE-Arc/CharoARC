<?php
    namespace App\Http\Controllers;

    use App\Models\Person;

    class HomeController extends Controller
    {
        public function index()
        {
            
            return view('home.index');
        }
    }