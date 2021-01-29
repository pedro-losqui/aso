<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        return view ('main.input.index');
    }
}
