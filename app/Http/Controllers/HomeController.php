<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller
{
    public function __invoke(){
        $list = Tarefa::where('resolvido',1)
                        ->orderBy('titulo')
                        ->get();

        foreach($list as $item){
            echo $item->titulo."<br/>";
        }
    }
}
