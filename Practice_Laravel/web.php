<?php

use Illuminate\Support\Facades\Route;
use App\Models\task;

use Illuminate\Http\Request;

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
    $tasks = task::orderBy('created_at', 'desc')->get();

    return view('task', [
        'tasks'=>$tasks
    ]);
});

Route::post('/task', function (Request $request){
    $validator = Validator::make($request->all(), [
        'name'=>'required|max:255',
        ]);
    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $task = new task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

Route::delete('/task/{task}', function ($id){
    table::findOrFail($id)->delete();
    return redirect('/');
});
