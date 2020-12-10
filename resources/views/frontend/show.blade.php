
@extends('frontend.base')

@section('title')
    El pais
@endsection

@section('content')

    <div class="container flex-center">
        @if($noticia->image == "")
            <div class="first-section" style="background-image:url('../assets/images/elpais.png')"></div>
        @else
            <div class="first-section" style="background-image:url('data:image/jpeg;base64,{{$noticia->image}}')"></div>
        @endif
        <div class="second-section">
            <h1>{{$noticia->title}}</h1>
            <div class="body-noticia">
                <p>{{$noticia->text}}</p>
            </div>
        </div>
        <div class="third-section">
            <div class="bloque-comentario">
                <h1>Comentarios:</h1>
                <hr>
            </div>
            @foreach ($comentarios as $comentario)
                
                <div class="comment">
                    <div class="firstpart">
                        <div><h2>{{$comentario->email}}</h2></div>
                        <div><p> Fecha: {{$comentario->date}}</p></div>
                    </div>
                    <div class="secondpart">
                        <p>{{$comentario->text}}</p>
                    </div>
                </div>
                
                
                
            @endforeach
            
    
    

            <form role="form" action="{{ url('backend/comentario') }}" method="post" id="createComentarioForm">
                @csrf
                <input type="text" name="email" placeholder="Correo" />
                <textarea name="text" class="textarea-comentario"></textarea>
                <input name="idnoticia" type="hidden" value={{$noticia->id}}>
                <button class="boton-azul" type="submit">Comentar</button>
            </form>
            
            <a href="{{ url('frontend') }}" style="height:40px;" class="">Volver</a> 
            
        </div>
    </div>
@endsection