<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicController extends Controller
{
    public function index()
    {
        return view ('main.medic.index');
    }
}
