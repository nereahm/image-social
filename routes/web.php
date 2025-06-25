<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //como Image es un ORM no hace falta instanciar con new

	/*$images = Image::all();//all()ya es propia del ORM y nos trae todo la q hay en images
	foreach($images as $image){
		echo $image->image_path."<br/>";
		echo $image->description."<br/>";
		echo $image->user->name.' '.$image->user->surname.'<br/>';

		if(count($image->comments) >= 1){
			echo '<h4>Comentarios</h4>';
			foreach($image->comments as $comment){
				echo $comment->user->name.' '.$comment->user->surname.': ';
				echo $comment->content.'<br/>';
			}
		}

        echo 'LIKES: '.count($image->likes);
		echo "<hr/>";

	}

	die();*/
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USUARIO
Route::get('/configuracion', [UserController::class, 'config'])->name('config');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/avatar/{filename}', [UserController::class, 'getImage'])->name('user.avatar');
Route::get('/gente/{search?}', [UserController::class, 'index'])->name('user.index');//?el parametro es opcional
Route::get('/perfil/{id}', [UserController::class, 'profile'])->name('profile');

// IMAGEN
Route::get('/subir-imagen', [ImageController::class, 'create'])->name('image.create');
Route::post('/image/save', [ImageController::class, 'save'])->name('image.save');
Route::get('/image/file/{filename}', [ImageController::class, 'getImage'])->name('image.file');
Route::get('/imagen/{id}', [ImageController::class, 'detail'])->name('image.detail');
Route::get('/imagen/editar/{id}', [ImageController::class, 'edit'])->name('image.edit');
Route::post('/image/update', [ImageController::class, 'update'])->name('image.update');
Route::get('/image/delete/{id}', [ImageController::class, 'delete'])->name('image.delete');

// LIKE
Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save');
Route::get('/dislike/{image_id}', [LikeController::class, 'dislike'])->name('like.delete');
Route::get('/likes', [LikeController::class, 'index'])->name('likes');

// COMENTARIO
Route::post('/comment/save', [CommentController::class, 'save'])->name('comment.save');
Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');