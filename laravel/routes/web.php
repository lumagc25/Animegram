<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;


Route::get('/', function () {
    /*
    //Esto muestra la potencia del ORM ya que no tenemos que hacer consultas complejas, para eso tenemos los objetos
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path . "<br/>";
        echo $image->description . "<br/>";
        echo $image->user->name . ' ' . $image->user->surname . "<br/>";
        echo 'Comentarios:' . "<br/>";
        foreach ($image->comments as $comment) {
            echo $comment->user->name . ' dice: ' . $comment->content . '<br/>';
        }
        echo 'Likes: ' .count($image->likes);
        echo "<hr/>";
    }
    die();
    */
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas usuario
Route::resource('users', 'UserController');
Route::get('/user/avatar/{filename}', [UserController::class, 'getImage'])->name('user.avatar');

//Rutas imagen
Route::resource('images', 'ImageController');