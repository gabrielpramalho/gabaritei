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

    public function gabarito(Request $request, $qtd)
    {

        

        $gabarito = new Gabarito();
        $gabarito->user_id = auth()->user()->id;
        $gabarito->nome = $request->nome;

        if($qtd == 20){
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
        }elseif($qtd == 40){
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
                '20' => $request->q_20,
                '21' => $request->q_21,
                '22' => $request->q_22,
                '23' => $request->q_23,
                '24' => $request->q_24,
                '25' => $request->q_25,
                '26' => $request->q_26,
                '27' => $request->q_27,
                '28' => $request->q_28,
                '29' => $request->q_29,
                '30' => $request->q_30,
                '31' => $request->q_31,
                '32' => $request->q_32,
                '33' => $request->q_33,
                '34' => $request->q_34,
                '35' => $request->q_35,
                '36' => $request->q_36,
                '37' => $request->q_37,
                '38' => $request->q_38,
                '39' => $request->q_39,
                '40' => $request->q_40
            ]; 
        }elseif($qtd == 60){
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
                '20' => $request->q_20,
                '21' => $request->q_21,
                '22' => $request->q_22,
                '23' => $request->q_23,
                '24' => $request->q_24,
                '25' => $request->q_25,
                '26' => $request->q_26,
                '27' => $request->q_27,
                '28' => $request->q_28,
                '29' => $request->q_29,
                '30' => $request->q_30,
                '31' => $request->q_31,
                '32' => $request->q_32,
                '33' => $request->q_33,
                '34' => $request->q_34,
                '35' => $request->q_35,
                '36' => $request->q_36,
                '37' => $request->q_37,
                '38' => $request->q_38,
                '39' => $request->q_39,
                '40' => $request->q_40,
                '41' => $request->q_41,
                '42' => $request->q_42,
                '43' => $request->q_43,
                '44' => $request->q_44,
                '45' => $request->q_45,
                '46' => $request->q_46,
                '47' => $request->q_47,
                '48' => $request->q_48,
                '49' => $request->q_49,
                '50' => $request->q_50,
                '51' => $request->q_51,
                '52' => $request->q_52,
                '53' => $request->q_53,
                '54' => $request->q_54,
                '55' => $request->q_55,
                '56' => $request->q_56,
                '57' => $request->q_57,
                '58' => $request->q_58,
                '59' => $request->q_59,
                '60' => $request->q_60
            ];

        }else{
            echo "putz";
        }


        $questoes = json_encode($questoes);
        
        $gabarito->respostas = $questoes;

        // dd($gabarito);

        $gabarito->save();

        return redirect()->route('gabarito')->with('msg', 'Gabarito criado com sucesso!');

    }
}
