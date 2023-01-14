<?php

namespace App\Http\Controllers;

use App\Models\Correcao;
use App\Models\Gabarito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Symfony\ Component\ Process\ Process;
use Symfony\ Component\ Process\ Exception\ ProcessFailedException;


class CorrecaoController extends Controller
{
    public function index()
    {

        $gabaritos = auth()->user()->gabaritos;

        return view('corrigir', ["gabaritos" => $gabaritos]);
    }

    public function corrigir(Request $request)
    {

        $id_user = auth()->user()->id;
        $name = $request->file('prova')->getClientOriginalName();
        $extension = $request->file('prova')->getClientOriginalExtension();

        
        $name = $id_user."_".$name;


        $name_db = DB::table('correcaos')->where('prova', $name)->first();

        if($name_db != null){
            $randomString = Str::random(10);
            $name = $randomString.".".$extension;
            
        }
        $request->file('prova')->storeAs('public/provas', $name);



        $gabarito = $request->gabarito;

        $qtd = DB::table('gabaritos')->where('id', $gabarito)->value('qtd');
    

        $correcao = new Correcao();
        $correcao->user_id = $id_user;
        $correcao->gabarito_id = $gabarito;
        $correcao->prova = $name;



        if($qtd == 20){
            $command = escapeshellcmd("python ".base_path().'/public/python/1coluna.py '.$name." ".$gabarito);
        }elseif($qtd == 40 ){
            $command = escapeshellcmd("python ".base_path().'/public/python/2colunas.py '.$name." ".$gabarito);
        }elseif($qtd == 60 ){
            $command = escapeshellcmd("python ".base_path().'/public/python/3colunas.py '.$name." ".$gabarito);
        }

        // dd($command);
        $output = shell_exec($command);
        
        $output = explode("\n", $output);



        $correcao->respostas = json_encode($output[0]);
        $correcao->nota = $output[1];
        $correcao->codebar = $output[2];
        

        $correcao->save();

        
        return redirect()->back();
    }

    public function test()
    {

        $command = escapeshellcmd("python ".base_path().'/public/python/1coluna.py');
        // $command = escapeshellcmd("python ".base_path().'/public/python/index.py');
        // dd($command);
        $output = shell_exec($command);
        echo $output;
        // dd($output);


    }


}
