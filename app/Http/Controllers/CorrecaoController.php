<?php

namespace App\Http\Controllers;

use App\Models\Correcao;
use Illuminate\Http\Request;

class CorrecaoController extends Controller
{
    public function index()
    {
        return view('corrigir', [
            'corrigir' => Correcao::all()
        ]);
    }


}
