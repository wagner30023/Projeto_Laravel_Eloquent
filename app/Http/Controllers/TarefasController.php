<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;
class TarefasController extends Controller
{
    public function list(){
        $list = Tarefa::all();
        
        return view('tarefas.list',[
            'list' => $list
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        //  filled: verifica se o post está preenchido.

        $request->validate([
            'titulo' => ['required','string']
        ]);

        $titulo = $request->input('titulo');
        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->save();

        return redirect()->route('tarefas.list');
    } 

    public function edit($id){
        $data = Tarefa::find($id);
        if($data){
            return view('tarefas.edit',[
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request,$id){
        $request->validate([
            'titulo' => ['required','string']
        ]);

        $titulo = $request->input('titulo');
        
        // $tarefa = Tarefa::find($id);
        // $tarefa->titulo = $titulo;
        // $tarefa->save();

        // outra formato para usar em uma única linha
        Tarefa::find($id)->update(['titulo' => $titulo]);

        return redirect()->route('tarefas.list');
        
    }
    

    public function del($id){
        Tarefa::find($id)->delete();

        return redirect()->route('tarefas.list');
    }


    public function done($id){
        // opcao 1: select + update 
        // opcao 2: update matematico  

        $tarefa = Tarefa::find($id);
            
        if($tarefa){
            $tarefa->resolvido = 1 - $tarefa->resolvido;
            $tarefa->save();
        }
        
        return redirect()->route('tarefas.list');
    }
}