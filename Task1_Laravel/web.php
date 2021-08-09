<?php
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    return view('welcome');
});
Route::get('profile/{name}', 'App\Http\Controllers\ProfileController@showProfile');
Route::get('home', 'App\Http\Controllers\HomeController@showWelcome');
Route::get('aboutt', 'App\Http\Controllers\AboutController@showDetails');

Route::get('contact', function (){
    return 'About Content';
});
Route::get('about/directions', function (){
    return 'Directions go here';
});
Route::any('submit-form',function (){
    return 'Process Form';
});

Route::get('about2/{theSubject}', 'App\Http\Controllers\AboutController@showSubject');

Route::get('about/{theSubject}',function ($theSubject) {
    return $theSubject. ' content goes here';
});
Route::get('about/classes/{Art}/{Price}', function ($Art, $Price) {
    return "The product: $Art and $Price";
});
Route::get('where', function () {
   return Redirect::to('about/directions');
});
Route::get('/insert', function (){
    DB::insert('insert into posts(title,body) value (?,?)',['PHP with Laravel','Laravel is the best framework !']);
    return 'DONE';
});
Route::get('/read', function (){
    $result = DB::select('select * from posts where id = ?', [1]);
    //return $result;
    foreach ($result as $post){
        return $post->body;
    }
});
Route::get('update', function (){
    $update = DB::update('update posts set title = "New Title hihi" where id > ?', [1]);
    return $update;
});
Route::get('delete', function (){
    $delete = DB::delete('delete from posts where id = ?',[3]);
    return $delete;
});
Route::get('readAll', function (){
    $posts = Post::all();
    foreach ($posts as $p){
        echo $p->title. " ". $p->body;
        echo "<br>";
    }
});
Route::get('findId', function (){
    $posts = Post::where('id','>=',1)
        ->where('title','PHP with Laravel')
        ->where('body', 'like', '@la@')
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();
    foreach ($posts as $p) {
        echo $p->title . " " . $p->body;
        echo "<br>";
        }
    });
Route::get('insertORM', function (){
    $p = new Post;
    $p->title = 'insert ORM';
    $p->body = 'INSERTED done done ORM';
    $p->is_admin = 1;
    $p->save();
});
Route::get('updateORM', function (){
    $p = Post::where('id', 2)->first();
    $p->title = 'update ORM';
    $p->body = 'update Ahihi DONE';
    $p->save();
});
Route::get('deleteORM', function (){
    Post::where('id', '>=', 2)
    ->delete();
});
Route::get('destroyORM', function (){
    Post::destroy(1);
});
