<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;//para las imagenes
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;//para poder hacer el get de imagenes
use App\Models\User;

class UserController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function config(){
        return view('user.config');
      }

      public function update(Request $request){//Request es lo q llega por formulario

        // Conseguir usuario identificado
        $user = Auth::user();// Auth::user() con esto ya tengo los datos Auth::porqe es estatic, la clase y el metodo lo hizo laravel
        $id = $user->id;//obtengo el id del usuario
  
        // Validación del formulario
        $validate = $this->validate($request, [//este validate esta en RegisterController autoHecho por laravel
                'name' => 'required|string|max:255',
          'surname' => 'required|string|max:255',
          'nick' => 'required|string|max:255|unique:users,nick,'.$id,//unique:users,nick q sea unico en la tabla de usuarios a excepción de q el nick coincida con el q esta logeado
                'email' => 'required|string|email|max:255|unique:users,email,'.$id//unique:users q sea unico en la tabla de usuarios a excepción de q el email coincida con el q esta logeado
            ]);
  
        // Recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
  
        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;//seteo las propiedades
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Subir la imagen
  		$image_path = $request->file('image_path');//al ser una imagen viene como file y image_path es porqe se llama asi

      if($image_path){
  			// Poner nombre unico
  			$image_path_name = time().$image_path->getClientOriginalName();//time()la hora actual en numeros de segundos eso hace un numero unico getClientOriginalName obtengo el nombre original cuando lo sube el usuario, hago unico el nombre

  			// Guardar en la carpeta storage (storage/app/users)
  			Storage::disk('users')->put($image_path_name, File::get($image_path));//el primer parametro va nombre de la imagen en el segundo parametro el fichero ,File::get me permite conseguir el fichero
        //CONFIGURAR LOS DISK PARA LAS IMAGENES config/filesystems.php
  			// Seteo el nombre de la imagen en el objeto
  			$user->image = $image_path_name;
  		}

        // Ejecutar consulta y cambios en la base de datos
        $user->update();
  
        return redirect()->route('config')
                 ->with(['message'=>'Usuario actualizado correctamente!!']);
      }

      public function getImage($filename){
        $file = Storage::disk('users')->get($filename);//Storage::disk('users') accedo al disco donde quiero sacar la imagen get metodo para sacar imagen
        return new Response($file, 200);
      }

      public function index($search = null){
        if(!empty($search)){//si no esta vacio
          $users = User::where('nick', 'LIKE', '%'.$search.'%')//LIKE es de sql y se usa para buscar cuando $search sea igual por % delante o por detras q el nick de la tabla
                  ->orWhere('name', 'LIKE', '%'.$search.'%')//orWhere o la siguiente si pusiera andWhere seria y la siguiente
                  ->orWhere('surname', 'LIKE', '%'.$search.'%')
                  ->orderBy('id', 'desc')
                  ->paginate(5);
        }else{
          $users = User::orderBy('id', 'desc')->paginate(5);//crea el objeto con todos los usuarios ordenados descendente con paginacion de 5
        }
    
        return view('user.index',[
          'users' => $users
        ]);
      }

    public function profile($id){
  		$user = User::find($id);//me crea el objeto de usuario q tenga ese id

  		return view('user.profile', [
  			'user' => $user
  		]);
  	}

}
