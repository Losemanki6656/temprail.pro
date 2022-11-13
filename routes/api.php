<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Temp;
use App\Models\TestDemo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('temppch', function (Request $request) {
    
    $temps = new Temp();
    $temps->organization_id = $request->userid;
    $temps->sector_id = $request->id;
    $temps->temp = $request->temp ?? 0;
    $temps->save();
    
    return 7;
});

Route::post('test', function (Request $request) {
    
    $temps = new TestDemo();
    $temps->testdemo = $request->userid;
    $temps->save();
    
    return response()->json(7);
});