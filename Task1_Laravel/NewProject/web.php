<?php

use Illuminate\Support\Facades\Route;
use App\Models\table;

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
    $table = table::orderBy('name', 'desc')->get();

    return view('table', [
        'table'=>$table
    ]);
});

Route::post('/table', function (Request $request){
    $validator = Validator::make($request->all(), [
        'name'=>'required|max:255',
        ]);
    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $table = new table;
    $table->name = $request->name;
    $table->save();

    return redirect('/');
});

Route::delete('/table/{table}', function ($id){
    table::findOrFail($id)->delete();
    return redirect('/');
});
