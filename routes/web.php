<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/api/wines', function () use ($router) {
    $wines = DB::select('select * from wine');

    return $wines;
});

$router->get("/api/wines/{id:[0-9]+}", function ($id) use ($router) {
    $wines = DB::select("select * from wine where id ='$id'");

    return $wines;
});

$router->get("/api/wines/search", function (Request $request) use ($router) {
    $keyword = $request->keyword;
    $wines = DB::select("select * from wine where name like '%$keyword%'");

    return $wines;
});


