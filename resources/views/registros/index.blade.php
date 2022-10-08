@extends('master')

@section('breadcrumb', 'Registros')

@section('title', 'Registros')

@section('content')
<div class="row">
    <br>
    <br>
    <div class="col-md-12">
        <div class="table-responsive no-padding">
            <div class="dataTables_wrapper no-footer">
                <table id="user_table" class="table table-hover table-bordered table-datatable table-striped" role="grid">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Hora de registro</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('registros.registro', $registros, 'registro')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection