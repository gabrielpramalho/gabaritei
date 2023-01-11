<?php

namespace App\Http\Controllers;
use App\Models\Gabarito;
use App\Models\User;
use Illuminate\Http\Request;

class GabaritoController extends Controller
{
    public function index()
    {
        return view('gabarito');
    }

    public function questoes(Request $request)
    {
        $questoes = $request->questoes;

        if($questoes == 1){
            return view('gabaritos/gabarito_20');
        }else if($questoes == 2){
            return view('gabaritos/gabarito_40');
        }elseif ($questoes == 3) {
            return view('gabaritos/gabarito_60');
        }
        else{
            echo "putz";
        }
    }

    public function gabarito(Request $request)
    {
        $gabarito = new Gabarito();
        $gabarito->user_id = auth()->user()->id;
        $gabarito->nome = $request->nome;
        // $gabarito->
        $questoes = [
            '1' => $request->q_1,
            '2' => $request->q_2,
            '3' => $request->q_3,
            '4' => $request->q_4,
            '5' => $request->q_5,
            '6' => $request->q_6,
            '7' => $request->q_7,
            '8' => $request->q_8,
            '9' => $request->q_9,
            '10' => $request->q_10,
            '11' => $request->q_11,
            '12' => $request->q_12,
            '13' => $request->q_13,
            '14' => $request->q_14,
            '15' => $request->q_15,
            '16' => $request->q_16,
            '17' => $request->q_17,
            '18' => $request->q_18,
            '19' => $request->q_19,
            '20' => $request->q_20
        ];

        $questoes = json_encode($questoes);
        
        $gabarito->respostas = $questoes;

        $gabarito->save();

        return redirect()->route('gabarito')->with('msg', 'Gabarito criado com sucesso!');

    }
}
