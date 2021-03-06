<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Temp;

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