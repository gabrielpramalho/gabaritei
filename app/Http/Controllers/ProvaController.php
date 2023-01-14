<?php

namespace App\Http\Controllers;

use App\Models\Prova;
use Illuminate\Http\Request;
use PDF;

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
        // $correcao->save();

        $qtd = [];
        $qtd[0] = $correcao->qtd;


        if($correcao->questoes == "1")
        {   

            $pdf = PDF::loadView('provas/20q', array('qtd' => $qtd));
            $pdf->setPaper('a4', 'portrait');
            $pdf->render();
            return $pdf->stream('prova.pdf');   
            
        }
        else if($correcao->questoes == "2")
        {
            $pdf = PDF::loadView('provas/40q', array('qtd' => $qtd));
            $pdf->setPaper('a4', 'portrait');
            $pdf->render();
            return $pdf->stream('prova.pdf');   
        }
        elseif ($correcao->questoes == "3")
        {
            $pdf = PDF::loadView('provas/60q', array('qtd' => $qtd));
            $pdf->setPaper('a4', 'portrait');
            $pdf->render();
            return $pdf->stream('prova.pdf');   
        }
        else
        {
            echo "erro";
        }

        // return redirect()->route('dashboard');
    }

    public function show_provas($id)
    {
        return view('provas');
    }
}
