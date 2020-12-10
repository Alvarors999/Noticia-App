@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/comentario/' . $comentario->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                <a href="{{ url('backend/comentario') }}" class="btn btn-primary">Comentarios</a>
                <a href="{{ url('backend/comentario/create') }}" class="btn btn-primary">Crear comentario</a>
                <a href="#" data-id="{{ $comentario->id }}" data-name="{{ $comentario->name }}" class="btn btn-danger" id="enlaceBorrar">Borrar comentario</a>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Text</td>
            <td>{{$comentario->text}}</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>{{$comentario->date}}</td>
        </tr>
        <tr>
            <td>Time</td>
            <td>{{$comentario->time}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$comentario->email}}</td>
        </tr>
       
       
    </tbody>
</table>
@endsection