@extends('backend.base')




@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/noticias/create') }}" class="btn btn-primary">Crear Noticia</a>
            </div>
        </div>
    </div>
</div>


@if(session()->has('op'))

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif




<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">text</th>
            <th scope="col">image</th>
            <th scope="col">author</th>
            <th scope="col">date</th>
            <th scope="col">add comment</th>
            <th scope="col">view comment</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($noticias as $noticia)
        <tr>
            <td scope="row">{{ $noticia->id }}</td>
            <td>{{ $noticia->title }}</td>
            <td>{{ $noticia->text }}
            <td>{{ $noticia->image }}</td>
            <td>{{ $noticia->author }}</td>
            <td>{{ date('d-m-Y', strtotime($noticia->date)) }}</td>
            
            
            <td><a href="{{ url('backend/comentario/create/' . $noticia->id) }}">add</a></td>
            <td><a href="{{ url('backend/comentario/' . $noticia->id . '/comentarios') }}">view</a></td>
            <td><a href="{{ url('backend/noticias/' . $noticia->id) }}">show</a></td>
            <td><a href="{{ url('backend/noticias/' . $noticia->id . '/edit') }}">edit</a></td>
            <td><a href="#" data-id="{{ $noticia->id }}" class="enlaceBorrar" >delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>



<form id="formDelete" action="{{ url('backend/noticias') }}" method="post">
    @method('delete')
    @csrf
</form>

@endsection