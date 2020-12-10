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
                <a href="#" data-id="{{ $comentario->id }}" data-name="{{ $comentario->name }}" class="btn btn-danger" id="enlaceBorrar">Borrar Comentario</a>
            </div>
        </div>
    </div>
</div>
@if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>
@endif
<form role="form" action="{{ url('backend/comentario/' . $comentario->id) }}" method="post" id="editComentarioForm" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
       <div class="form-group">
            <label for="text">Text</label>
            <input type="text" maxlength="400" minlength="2" required class="form-control" id="text" placeholder="Cuerpo del comentario" name="text" value="{{ old('text', $comentario->text) }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="time"  name="time" value="{{ old('date', $comentario->date) }}">
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $comentario->time) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" maxlength="40" minlength="2" required class="form-control" id="email" placeholder="Email de la noticia" name="email" value="{{ old('email', $comentario->email) }}">
        </div>
    </div>
    
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection