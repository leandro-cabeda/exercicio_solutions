<?php






/*
----------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/', function () {
return view('welcome');
}
);
*/

Auth::routes();

Route::get('/',"HomeController@index")->name("welcome");

Route::resource("/usuarios","UsuarioController",["except"=>["destroy"]]);
Route::get('/usuarios/{usuario}/delete',"UsuarioController@destroy")->name("usuarios.destroy");

Route::resource("/comentarios","ComentarioController");

Route::post('login',"HomeController@login");

