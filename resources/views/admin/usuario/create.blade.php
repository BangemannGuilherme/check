@extends('admin.master')

@section('breadcrumb', 'Usuário')

@section('title', 'Usuário')

@section('content')
<h1>Criar Usuario</h1>
<hr>

<div class="col-md-12 text-right">
    <a class="btn btn-primary" href="{{url('admin/users/') }}"><i class="fas fa-undo-alt"></i> Voltar</a>
</div>
<div class="col-md-12">
    <form class="m-t" role="form" method="POST" action="{{ url('admin/users/create') }}">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                    <label for="username">Nome de usuário</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('rfid') ? 'has-error' : ''}}">
                    <label for="rfid">rfid</label>
                    <input type="text" class="form-control" name="rfid" placeholder="rfid">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                    <label for="code">code</label>
                    <input type="text" class="form-control" name="code" placeholder="code">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('admin') ? 'has-error' : ''}}">
                <label for="admin">admin</label>
                    <select class="form-control" name="admin">
                        <option value="true">Sim</option>
                        <option value="false">Não</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-success block m-b">Salvar</button>
            </div>
        </div>
    </form>
</div>
@endsection
