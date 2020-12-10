@extends('frontend.base')

@section('title')
    El pais
@endsection

@section('content')
    <div class="container">
         @foreach ($noticias as $noticia)
        @if($noticia->image == "")
        <a href="{{ url('frontend/' . $noticia->id) }}" style="background-image:url('assets/images/elpais.png')">
            <div class="bg">
                <p id="firstp">EVERYTHING WE KNOW ABOUT: {{$noticia['title']}}</p>
                <h1 style="color:black;">{{$noticia['title']}}</h1>
                <p style="color:black;" id="secondp">By {{$noticia['author']}}</p>
            </div>
        </a>
        @else
        <a href="{{ url('frontend/' . $noticia->id) }}" style="background-image:url('data:image/jpeg;base64,{{$noticia->image}}')">
            <div class="bg">
                <p id="firstp">EVERYTHING WE KNOW ABOUT: {{$noticia['title']}}</p>
                <h1>{{$noticia['title']}}</h1>
                <p id="secondp">By {{$noticia['author']}}</p>
            </div>
        </a>
        @endif
        @endforeach
    </div>
    
@endsection

    <!--@foreach ($noticias as $noticia)-->
    <!--    <tr>-->
    <!--        <td scope="row">{{ $noticia->id }}</td>-->
    <!--        <td>{{ $noticia->title }}</td>-->
    <!--        <td>{{ $noticia->text }}-->
    <!--        <td>{{ $noticia->image }}</td>-->
    <!--        <td>{{ $noticia->author }}</td>-->
    <!--        <td>{{ date('d-m-Y', strtotime($noticia->date)) }}</td>-->
            
            
    <!--        <td><a href="{{ url('backend/comentario/create/' . $noticia->id) }}">add</a></td>-->
    <!--        <td><a href="{{ url('backend/comentario/' . $noticia->id . '/comentarios') }}">view</a></td>-->
    <!--        <td><a href="{{ url('backend/noticias/' . $noticia->id) }}">show</a></td>-->
    <!--        <td><a href="{{ url('backend/noticias/' . $noticia->id . '/edit') }}">edit</a></td>-->
    <!--        <td><a href="#" data-id="{{ $noticia->id }}" class="enlaceBorrar" >delete</a></td>-->
    <!--    </tr>-->
    <!--@endforeach-->