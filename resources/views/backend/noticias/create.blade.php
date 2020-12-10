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
                <a href="{{ url('backend/noticias') }}" class="btn btn-primary">Noticia</a>
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
<form role="form" action="{{ url('backend/noticias') }}" method="post" id="createNoticiaForm" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" maxlength="40" minlength="2" required class="form-control" id="title" placeholder="Titulo de la noticia" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <input type="text" maxlength="400" minlength="1" required class="form-control" id="text" placeholder="Descipcion de la noticia" name="text" value="{{ old('text') }}">
        </div>
        <div class="">
            <label for="image">Image</label>
            <input type="file" required class="form-control" value="image" id="image" name="image" value="">
        
        </div>
        <div class="form-group">
            <label for="author">Autor de la noticia</label>
            <input type="text" maxlength="40" minlength="2" required class="form-control" id="author" placeholder="Autor de la noticia" name="author" value="{{ old('author') }}">
        </div>
         <div class="form-group">
            <label for="date">Fecha de la noticia</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
        </div>
       
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
                

</form>
@endsection