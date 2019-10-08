@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table text-center font-18 font-weight-bold">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{ $usuario->id }}</th>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="w-25">
                            @if (trim($usuario->foto) != "")
                            <img src="{{ asset($usuario->foto) }}" class="img-thumbnail w-50"
                                alt="{{ $usuario->nome }}" />
                            @else
                            Sem Imagem!
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-primary btn-sm"> <i
                                    class="fas fa-eye">&ensp;Visualizar</i></a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary btn-sm"> <i
                                    class="far fa-edit ">&ensp;Editar</i></a>
                            <a onclick="return confirm('Deseja realmente excluir?')" href="{{ route('usuarios.destroy',$usuario->id) }}" class="btn btn-danger btn-sm"><i
                                    class="far fa-trash-alt">&ensp;Excluir</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
