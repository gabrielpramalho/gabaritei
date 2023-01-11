<?php

namespace App\Http\Controllers;

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
}
