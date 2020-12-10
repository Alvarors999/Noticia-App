@extends('backend.base')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')
<form id="formDelete" action="{{ url('backend/noticias/' . $noticia->id) }}" method="post">
    @method('delete')
    @csrf
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                <a href="{{ url('backend/noticias') }}" class="btn btn-primary">Noticias</a>
                <a href="{{ url('backend/noticias/create') }}" class="btn btn-primary">Crear noticia</a>
                <a href="#" data-id="{{ $noticia->id }}" data-name="{{ $noticia->name }}" class="btn btn-danger" id="enlaceBorrar">Borrar noticia</a>
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
            
            <td>Title</td>
            <td>{{$noticia->title}}</td>
        </tr>
        <tr>
            <td>Text</td>
            <td>{{$noticia->text}}</td>
        </tr>
        <tr>
            <td>Image</td>
           <td><div class="icon-image" style="background-image:url('data:image/jpeg;base64,{{$noticia->image}}')"></div></td>
        </tr>
        <tr>
            <td>Author</td>
            <td>{{$noticia->author}}</td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>{{$noticia->date}}</td>
        </tr>
    </tbody>
</table>
@endsection