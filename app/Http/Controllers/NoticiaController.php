<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function index()
    {
        $noticias = Noticia::all();
        
        return view('backend.noticias.index', ['noticias' => $noticias]);
    }


    public function create()
    {
        return view('backend.noticias.create');
    }
    
    private function generateBase64Image($noticia, $isEditing = false){
        if($_FILES['image']['error'] == 0) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            
            $base64 = base64_encode($image);
            if(!$isEditing){
                $noticia->image = $base64;
            }else{
                $noticia["image"] = $base64;
            }
        
        }else {
            $noticia->image = '';
        }
        return $noticia;
    }   
    
    public function store(Request $request)
    {
        $noticia = new Noticia($request->all());
        $noticia = $this->generateBase64Image($noticia);
        
        try {
            $result = $noticia->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($noticia->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $noticia->id];
            return redirect('backend/noticias')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }


    public function show(Noticia $noticia)
    {
        return view('backend.noticias.show', ['noticia' => $noticia]);
        
    }

    public function edit(Noticia $noticia)
    {
        return view('backend.noticias.edit', ['noticia' => $noticia]);
    }


    public function update(Request $request, Noticia $noticia)
    {
        try {
            $noticiaAux = ($request->all());
            $noticiaAux = $this->generateBase64Image($noticiaAux, true);
            $result = $noticia->update($noticiaAux);
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $noticia->id];
            return redirect('backend/noticias')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }


    public function destroy(Noticia $noticia)
    {
        $id = $noticia->id;
        try {
            $result = $noticia->delete();
        } catch(\Exception $e) {
            $result = "No se ha podido borrar";
        }
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/noticias')->with($response);
    
    }
    
}
