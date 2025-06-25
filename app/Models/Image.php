<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    //le indico cual va ser la tabla que va a corresponder a este modelo
    protected $table = 'images';
    // Relación One To Many / de uno a muchos
//CUANDO LLAME A ESTE METODO.. LA RELACION es EL ID DEl objeto imagen CON IMAGE_ID DE CommentS (al poner esto hasMany)
public function comments(){
    return $this->hasMany('App\Models\Comment')->orderBy('id', 'desc');//hasMany('App\Comment')quiero q trabaje con el modelo App\Models\Comment,
  
  }

  // Relación One To Many
public function likes(){
  return $this->hasMany('App\Models\Like');
}

// Relación de Muchos a Uno
//ACA CUANDO SE LLAMA A ESTE METODO... LA RELACION ACA ES el id DE User CON el user_id DE Image (al poner esto belongsTo) esto App\User quiere decir q voy a trabajar con la clase User
public function user(){
  return $this->belongsTo('App\Models\User', 'user_id');
 
}

}
