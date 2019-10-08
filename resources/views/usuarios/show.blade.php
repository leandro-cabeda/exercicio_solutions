@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Perfil</div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>ID: {{ $usuario->id }}</h3>
                            @if (trim($usuario->foto) != "")
                            <img src="{{ asset($usuario->foto) }}" class="img-thumbnail w-25"
                                alt="{{ $usuario->nome }}" />
                            @else
                            <h3>Sem Imagem!</h3>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Nome: {{ $usuario->nome }}</h3>
                            <h3>E-mail: {{ $usuario->email }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary btn-sm"> <i
                                    class="far fa-edit ">&ensp;Editar</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
