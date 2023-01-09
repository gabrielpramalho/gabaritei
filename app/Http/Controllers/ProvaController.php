<?php

namespace App\Http\Controllers;

use App\Models\Prova;
use Illuminate\Http\Request;

class ProvaController extends Controller
{
    public function index()
    {
        return view('prova', [
            'prova' => Prova::all()
        ]);
    }

    public function store(Request $request)
    {

        $correcao = new Prova();
        $correcao->questoes = $request->questoes;
        $correcao->qtd = $request->qtd;
        // dd($correcao);
        $correcao->save();

        return redirect()->route('dashboard');
    }
}
