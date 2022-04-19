<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = ['user_id', 'image_id', 'content'];

    //Relacion M:1
    //Un usuario puede tener muchos comentarios
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    //Una imagen puede tener muchos comentarios
    public function image(){
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
