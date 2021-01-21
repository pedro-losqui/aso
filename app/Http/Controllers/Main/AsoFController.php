<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsoFController extends Controller
{
    public function index()
    {
        return view ('main.aso.fisica.index');
    }

    public function create()
    {
        return view ('main.aso.fisica.create');
    }

    public function show($id)
    {
        $aso = Aso::find($id);
        return view ('main.aso.fisica.show', compact('aso'));
    }
}
