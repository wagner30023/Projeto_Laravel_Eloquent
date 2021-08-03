@extends('layouts.admin')

@section('title','Adicionar de tarefa')

@section('content')
    @if ($errors->any())
        @alert
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endalert
    @endif

    <br/>
    <div class="container">
        <div class="row">
            <br/>
            <br/>
            <center>
            <div id="content" >
                <h1> Adicionar tarefa </h1>
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nome" class="iconic user">
                            <input type="text" class="form-control" type="text" name="titulo" />
                        </label>
                        <button type="submit" class="btn btn-info" value="Adicionar"> Adicionar </button>
                    </div>
                </form>
            </div>
            <center>
        </div>
    </div>
@endsection