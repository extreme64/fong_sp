<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About Us - Store Forward Creating';

        return view('about', compact('title'));
    }
}