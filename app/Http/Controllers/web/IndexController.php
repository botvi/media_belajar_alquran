<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('pageweb.index');
    }
}
