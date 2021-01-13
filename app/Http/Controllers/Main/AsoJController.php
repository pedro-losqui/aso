<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aso;

class AsoJController extends Controller
{
    public function index()
    {
        return view ('main.aso.juridica.index');
    }

    public function create()
    {
        return view ('main.aso.juridica.create');
    }

    public function show($id)
    {
        $aso = Aso::find($id);
        return view ('main.aso.juridica.show', compact('aso'));
    }
}
