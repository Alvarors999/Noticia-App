<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    public function index()
    {
        $comentarios = Comentario::all();
        
        return view('backend.comentario.index', ['comentarios' => $comentarios]);
    }


    public function create()
    {
        $noticias = Noticia::all();
        return view('backend.comentario.create',['noticias'=>$noticias]);
    }
    
    function addComentarios($idnoticia) {
        $noticia = Noticia::find($idnoticia);
        return view('backend.comentario.create', ['noticia' => $noticia]); 
    }
    
    private function getDates($comentario){
        $comentario->date = date('Y-m-d');
        $comentario->time = date('h:i:s');
        return $comentario;
    }
    
    public function store(Request $request)
    {
        $isAdmin = true;
        $comentario = new Comentario($request->all());
        if(is_null($comentario->date)){
            $comentario = $this->getDates($comentario);
            $isAdmin = false;
        }
        
        try {
            $result = $comentario->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        
        if($isAdmin){
            if($comentario->id > 0) {
                $response = ['op' => 'create', 'r' => $result, 'id' => $comentario->id];
                return redirect('backend/comentario')->with($response);
            }
        }else{
            return redirect('frontend/'. $comentario->idnoticia);
        }
        
        return back()->withInput()->with(['error' => 'algo ha fallado']);
    }

    public function show(Comentario $comentario)
    {
        return view('backend.comentario.show', ['comentario' => $comentario]);
    }
    
    
    function showComentarios($idnoticia) { 
        $comentarios = Comentario::where('idnoticia', $idnoticia)
                ->orderBy('text', 'asc')
                ->get();
    
        return view('backend.comentario.index', ['comentarios' => $comentarios]);
    }

    public function edit(Comentario $comentario)
    {
        return view('backend.comentario.edit', ['comentario' => $comentario]);
    }

    public function update(Request $request, Comentario $comentario)
    {
        try {
            $result = $comentario->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $comentario->id];
            return redirect('backend/comentario')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

 
    public function destroy(Comentario $comentario)
    {
        $id = $comentario->id;
        try {
            $result = $comentario->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/comentario')->with($response);
    
    }
    
    
}
