@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                <a href="{{ url('backend/comentario') }}" class="btn btn-primary">Comentarios</a>
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
<form role="form" action="{{ url('backend/comentario') }}" method="post" id="createComentarioForm">
    @csrf
     <div class="form-group">
            <label for="idnoticia">Noticia</label>
            
            @if(isset($noticias))
            <select name="idnoticia" id="idnoticia" required class="form-control">
                <option value="" disabled selected>Select noticia</option>
                @foreach($noticias as $noticia)
                
                <option value="{{ $noticia->id }}">{{ $noticia->title . ' ' . $noticia->author }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $noticia->title . ' ' . $noticia->author }}" readonly class="form-control">
                <input type="hidden" id="idnoticia" name="idnoticia" value="{{ $noticia->id }}">
            @endif
            
        </div>
    <div class="card-body">
        <div class="form-group">
            <label for="text">Text</label>
            <input type="text" maxlength="400" minlength="2" required class="form-control" id="text" placeholder="Cuerpo del comentario" name="text" value="{{ old('text') }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date"  name="date" value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" maxlength="40" minlength="2" required class="form-control" id="email" placeholder="Autor del comentario" name="email" value="{{ old('email') }}">
        </div>
         
       
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection