@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reservaciones</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="table-reservations" width="100%">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Restaurant</th>
                    <th>Section</th>
                    <th>Mesa</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Factura</th>
                    <th>Folio</th>
                    <th>Acción</th>
                </tr>
            </thead>
        </table>
    </div>
    <div type="button" data-toggle="modal" data-target="#modal-reservation-add" class="btn btn-modal elevation-3 rounded-circle bg-success">
        <i class="fas fa-plus fa-2x"></i>
    </div>
</div>

@include('admin.reservation.form-reservation', ['title' => 'Add', 'action' => 'add'])
@include('admin.reservation.form-reservation', ['title' => 'Update', 'action' => 'update'])

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('js/ui.js') }}"></script>
    <script src="{{ asset('js/actions.js') }}"></script>
    <script src="{{ asset('js/admin_reservations.js') }}"></script>
@stop
