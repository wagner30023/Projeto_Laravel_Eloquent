<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list(){
        $list = DB::select('SELECT * FROM tarefas');

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
        DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)',[
            'titulo' => $titulo 
        ]);

        return redirect()->route('tarefas.list');
    } 

    public function edit($id){
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id',[
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('tarefas.edit',[
                'data' => $data[0]
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
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id',[
            'id' => $id
        ]);
    
        if(count($data) > 0){
            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id',[
                'id' => $id,
                'titulo' => $titulo
            ]);
        } 

        return redirect()->route('tarefas.list');
        
    }
    

    public function del($id){
        DB::delete('delete from tarefas where id = :id',[
            'id' => $id
        ]); 
        return redirect()->route('tarefas.list');
    }


    public function done($id){
        // opcao 1: select + update 
        // opcao 2: update matematico  
        DB::update('UPDATE tarefas  SET resolvido = 1 - resolvido WHERE id = :id',[
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }
}