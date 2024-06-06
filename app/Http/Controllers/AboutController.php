<?php

namespace App\Http\Controllers;


class AboutController extends Controller
{
    public function index()
    {
        $title = 'About Us - Store Forward Creating';

        return view('about', compact('title'));
    }
}