@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table-clients" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Nickname</th>
                    <th>RFC</th>
                </tr>
            </thead>
        </table>
    </div>
    <div type="button" data-toggle="modal" data-target="#modal-client-add" class="btn btn-modal elevation-3 rounded-circle bg-success">
        <i class="fas fa-plus fa-2x"></i>
    </div>
</div>

@include('admin.client.form-client', ['title' => 'Add', 'action' => 'add'])

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/ui.js') }}"></script>
    <script src="{{ asset('js/actions.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
@stop
