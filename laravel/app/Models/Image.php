<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";
    protected $fillable = ['user_id', 'image_path', 'description'];

    //Relacion M:1 se usa belongsTo()
    //Un usuario puede tener muchas imagenes
    //Da el usuario propietario de la imagen
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //Relacion 1:M usando hasmany()
    //Muchos comentarios puede tener una imagen
    //Con esto sacamos todos los comentarios asociados a esa imagen
    public function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }

    //Esto me sacara todos los likes asociados a una imagen
    public function likes(){
        return $this->hasMany('App\Models\Like')->orderBy('id','desc');
    }
}
