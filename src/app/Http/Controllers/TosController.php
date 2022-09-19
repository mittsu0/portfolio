<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TosController extends Controller
{
    public function index()
    {
        return view('tos.tos');
    }
}
