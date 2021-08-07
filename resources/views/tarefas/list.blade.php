@extends('layouts.admin')

@section('title','Listagem de Tarefas')

@section('content')
    <div class="container">
        <h1> Tarefas </h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered table-hover table-responsive" >
            <thead>
                <th> <center> ID </center></th>
                <th> <center> Titulo </center> </th>
                <th><center> Ações </center></th>
            </thead>
            
            <tbody>
                @if(count($list) > 0)     
                    @foreach($list as $item)
                        <tr>
                            
                                <td> 
                                    <center>
                                        <a href="{{ route('tarefas.done',['id' => $item->id])}}">[@if($item->resolvido===1) desmarcar @else marcar @endif] </a>
                                    </center>
                                </td>
                            
                                <td> 
                                    <center>
                                        {{ $item->titulo }}        
                                    </center>  
                                </td>
                                
                                <td> 
                                    <center>
                                        <a class="btn btn-small btn-success" href="{{ route('tarefas.edit',['id' => $item->id])}}" > [ Editar ]</a>
                                        <a class="btn btn-small btn-danger" href="{{ route('tarefas.del',['id' => $item->id])}}" onclick="return confirm(' Tem certeza que deseja excluir? ')" > [ Excluir ]</a>  
                                    </center>
                                </td>
                        </tr>           
                    @endforeach        
                @else
                    Não há itens a serem listados.
                @endif
            
            </tbody>
        </table>
    </div>
@endsection