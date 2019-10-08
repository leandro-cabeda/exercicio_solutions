@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Registrar</div>
                <div class="card-body">
                    <form action="{{ route('usuarios.store') }}" class="form-horizontal" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-md-3 col-form-label  text-md-right">Nome:</label>
                            <div class="col-md-9 pl-0">
                                <input type="text" placeholder="Digite seu Nome" class="form-control text-muted"
                                    name="nome" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label  text-md-right">E-mail:</label>
                            <div class="col-md-9 pl-0">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon">@</div>
                                    </div>
                                    <input type="email" placeholder="Digite seu E-mail" class="form-control text-muted"
                                        name="email" required autofocus aria-describedby="btnGroupAddon">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="senha" class="col-md-3 col-form-label  text-md-right">Senha:</label>
                            <div class="col-md-9 pl-0">
                                <input type="password" placeholder="Digite sua Senha" class="form-control text-muted"
                                    name="senha" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-md-3 col-form-label  text-md-right">Escolher Foto:</label>
                            <div class="col-md-9 pl-0">
                                <input type="file" class="form-control-file" name="foto">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="width:60%;" type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
