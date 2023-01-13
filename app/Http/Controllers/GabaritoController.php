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
        $gabarito->qtd = $qtd;

        if($qtd == 20){

            $questoes[0] = 0;
            $questoes[1] = $request->q_1;
            $questoes[2] = $request->q_2;
            $questoes[3] = $request->q_3;
            $questoes[4] = $request->q_4;
            $questoes[5] = $request->q_5;
            $questoes[6] = $request->q_6;
            $questoes[7] = $request->q_7;
            $questoes[8] = $request->q_8;
            $questoes[9] = $request->q_9;
            $questoes[10] = $request->q_10;
            $questoes[11] = $request->q_11;
            $questoes[12] = $request->q_12;
            $questoes[13] = $request->q_13;
            $questoes[14] = $request->q_14;
            $questoes[15] = $request->q_15;
            $questoes[16] = $request->q_16;
            $questoes[17] = $request->q_17;
            $questoes[18] = $request->q_18;
            $questoes[19] = $request->q_19;
            $questoes[20] = $request->q_20;

        }elseif($qtd == 40){
            $questoes[0] = 0;
            $questoes[1] = $request->q_1;
            $questoes[2] = $request->q_2;
            $questoes[3] = $request->q_3;
            $questoes[4] = $request->q_4;
            $questoes[5] = $request->q_5;
            $questoes[6] = $request->q_6;
            $questoes[7] = $request->q_7;
            $questoes[8] = $request->q_8;
            $questoes[9] = $request->q_9;
            $questoes[10] = $request->q_10;
            $questoes[11] = $request->q_11;
            $questoes[12] = $request->q_12;
            $questoes[13] = $request->q_13;
            $questoes[14] = $request->q_14;
            $questoes[15] = $request->q_15;
            $questoes[16] = $request->q_16;
            $questoes[17] = $request->q_17;
            $questoes[18] = $request->q_18;
            $questoes[19] = $request->q_19;
            $questoes[20] = $request->q_20;
            $questoes[21] = $request->q_21;
            $questoes[22] = $request->q_22;
            $questoes[23] = $request->q_23;
            $questoes[24] = $request->q_24;
            $questoes[25] = $request->q_25;
            $questoes[26] = $request->q_26;
            $questoes[27] = $request->q_27;
            $questoes[28] = $request->q_28;
            $questoes[29] = $request->q_29;
            $questoes[30] = $request->q_30;
            $questoes[31] = $request->q_31;
            $questoes[32] = $request->q_32;
            $questoes[33] = $request->q_33;
            $questoes[34] = $request->q_34;
            $questoes[35] = $request->q_35;
            $questoes[36] = $request->q_36;
            $questoes[37] = $request->q_37;
            $questoes[38] = $request->q_38;
            $questoes[39] = $request->q_39;
            $questoes[40] = $request->q_40;
        }elseif($qtd == 60){
            $questoes[0] = 0;
            $questoes[1] = $request->q_1;
            $questoes[2] = $request->q_2;
            $questoes[3] = $request->q_3;
            $questoes[4] = $request->q_4;
            $questoes[5] = $request->q_5;
            $questoes[6] = $request->q_6;
            $questoes[7] = $request->q_7;
            $questoes[8] = $request->q_8;
            $questoes[9] = $request->q_9;
            $questoes[10] = $request->q_10;
            $questoes[11] = $request->q_11;
            $questoes[12] = $request->q_12;
            $questoes[13] = $request->q_13;
            $questoes[14] = $request->q_14;
            $questoes[15] = $request->q_15;
            $questoes[16] = $request->q_16;
            $questoes[17] = $request->q_17;
            $questoes[18] = $request->q_18;
            $questoes[19] = $request->q_19;
            $questoes[20] = $request->q_20;
            $questoes[21] = $request->q_21;
            $questoes[22] = $request->q_22;
            $questoes[23] = $request->q_23;
            $questoes[24] = $request->q_24;
            $questoes[25] = $request->q_25;
            $questoes[26] = $request->q_26;
            $questoes[27] = $request->q_27;
            $questoes[28] = $request->q_28;
            $questoes[29] = $request->q_29;
            $questoes[30] = $request->q_30;
            $questoes[31] = $request->q_31;
            $questoes[32] = $request->q_32;
            $questoes[33] = $request->q_33;
            $questoes[34] = $request->q_34;
            $questoes[35] = $request->q_35;
            $questoes[36] = $request->q_36;
            $questoes[37] = $request->q_37;
            $questoes[38] = $request->q_38;
            $questoes[39] = $request->q_39;
            $questoes[40] = $request->q_40;
            $questoes[41] = $request->q_41;
            $questoes[42] = $request->q_42;
            $questoes[43] = $request->q_43;
            $questoes[44] = $request->q_44;
            $questoes[45] = $request->q_45;
            $questoes[46] = $request->q_46;
            $questoes[47] = $request->q_47;
            $questoes[48] = $request->q_48;
            $questoes[49] = $request->q_49;
            $questoes[50] = $request->q_50;
            $questoes[51] = $request->q_51;
            $questoes[52] = $request->q_52;
            $questoes[53] = $request->q_53;
            $questoes[54] = $request->q_54;
            $questoes[55] = $request->q_55;
            $questoes[56] = $request->q_56;
            $questoes[57] = $request->q_57;
            $questoes[58] = $request->q_58;
            $questoes[59] = $request->q_59;
            $questoes[60] = $request->q_60;
        }else{
            echo "putz";
        }


        $questoes = json_encode($questoes);

        // dd($questoes);
        
        $gabarito->respostas = $questoes;

        // dd($gabarito);

        $gabarito->save();

        return redirect()->route('gabarito')->with('msg', 'Gabarito criado com sucesso!');

    }
}
