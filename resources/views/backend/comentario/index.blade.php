@extends('backend.base')




@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/comentario/create') }}" class="btn btn-primary">Crear Comentario</a>
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
            <th scope="col">noticia</th>
            <th scope="col">text</th>
            <th scope="col">date</th>
            <th scope="col">time</th>
            <th scope="col">email</th>
            <th scope="col">show</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($comentarios as $comentario)
        <tr>
            <td scope="row">{{ $comentario->id }}</td>
            <td scope="row">{{ $comentario->noticia->title }}</td>
            <td>{{ $comentario->text }}</td>
            <td>{{ date('d-m-Y', strtotime($comentario->date)) }}</td>
            <td>{{ $comentario->time }}</td>
            <td>{{ $comentario->email }}</td>
            
    
            <td><a href="{{ url('backend/comentario/' . $comentario->id) }}">show</a></td>
            <td><a href="{{ url('backend/comentario/' . $comentario->id . '/edit') }}">edit</a></td>
            <td><a href="#" data-id="{{ $comentario->id }}" class="enlaceBorrar" >delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>



<form id="formDelete" action="{{ url('backend/comentario') }}" method="post">
    @method('delete')
    @csrf
</form>

@endsection