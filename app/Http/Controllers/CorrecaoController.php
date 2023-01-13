<?php

namespace App\Http\Controllers;

use App\Models\Correcao;
use App\Models\Gabarito;
use Illuminate\Http\Request;
use Symfony\ Component\ Process\ Process;
use Symfony\ Component\ Process\ Exception\ ProcessFailedException;


class CorrecaoController extends Controller
{
    public function index()
    {

        $gabaritos = auth()->user()->gabaritos;

        return view('corrigir', ["gabaritos" => $gabaritos]);
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
