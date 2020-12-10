<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Comentario;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        $noticias = Noticia::all();
        
        return view('frontend.index', ['noticias' => $noticias]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {   
        $noticia = Noticia::find($id);
        $comentarios = Comentario::where('idnoticia', $id)->get();
        return view('frontend.show', ['noticia' => $noticia, 'comentarios' => $comentarios]);
        

        // $noticias = Noticia::all();
        // return view('frontend.show', ['noticias' => $noticias]);
        
        
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
