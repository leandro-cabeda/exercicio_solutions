@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="post" class="form-horizontal" action="{{ route('login') }}">
                        @csrf
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
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="width:60%;" type="submit" class="btn btn-primary">
                                    Entrar
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
