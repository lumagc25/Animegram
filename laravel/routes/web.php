<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

//Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');
//Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::resource('users', 'UsertwoController');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');
