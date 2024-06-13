<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact Us - Store Forward Creating';

        return view('contact', compact('title'));
    }
}
