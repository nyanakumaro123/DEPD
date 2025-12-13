<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function landing()
    {
        return view('landing', [
            'headerTitle' => 'PathLoka - Find Your Career Path'
        ]);
    }
}