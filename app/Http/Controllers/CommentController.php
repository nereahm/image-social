<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//este middleware hace q el resto de metodos sean privados
    }

    public function save(Request $request){

        // Validación
        $validate = $this->validate($request, [
          'image_id' => 'integer|required',
          'content' => 'string|required'
        ]);
    
        // Recoger datos
        $user = Auth::user();//OBTENGO AL USUARIO LOGEADO
        $image_id = $request->input('image_id');//lo del post ya lo ingreso aca
        $content = $request->input('content');
    
        // Asigno los valores a mi nuevo objeto a guardar
        $comment = new Comment();//instancia la clase q es un modelo
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;
    
        // Guardar en la bd
        $comment->save();//esto me lo guarda a la tabla de la base de datos save()esta hecho por laravel y me ahorro de hacer input value etc..
    
        // Redirección
        return redirect()->route('image.detail', ['id' => $image_id])
                ->with([
                  'message' => 'Has publicado tu comentario correctamente!!'
                ]);
    }

    public function delete($id){
        
        // Conseguir datos del usuario logueado
        $user = Auth::user();
    
        // Conseguir objeto del comentario
        $comment = Comment::find($id);// con find($id) me saca un objeto de ese id
    
        // Comprobar si soy el dueño del comentario o de la publicación
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            
            $comment->delete();//me elimina el comentario
    
        return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with([
                'message' => 'Comentario eliminado correctamente!!'
                ]);
        }else{
        return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with([
                'message' => 'EL COMENTARIO NO SE HA ELIMINADO!!'
                ]);
        }
}

}
