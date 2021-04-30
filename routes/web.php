<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\WineController;

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

//GET	/api/wines
$router->get('/api/wines', 'WineController@getAllWines');

//GET	/api/wines/10
$router->get("/api/wines/{id:[0-9]+}", 'WineController@getWineById');

//GET	/api/wines?key=country&val=France&sort=year
$router->get("/api/wines}", 'WineController@getWinesBySearch');

//GET	/api/wines/search?keyword=Chateau
$router->get("/api/wines/search", 'WineController@getWineByKeyword');

//GET	/api/wines/10/comments
$router->get("/api/wines/{id:[0-9]+}/comments", 'WineController@getCommentWine');

//GET	/api/wines/countries
$router->get("/api/wines/countries", 'WineController@getCountries');

//GET	/api/wines/10/likes-count
$router->get("/api/wines/{id:[0-9]+}/likes-count", 'WineController@getNbLike');

//GET	/api/users/5/likes/wines
$router->get("/api/users/{id:[0-9]+}/likes/wines", 'WineController@getLikeWine');

//PUT	/api/wines/10/like
//{ "like" : true|false }
$router->get("/api/wines/{id:[0-9]+}/like", 'WineController@likeThisWine');

//POST	/api/wines/10/comments
//{ "content" : "some content" }
$router->post("/api/wines/{id:[0-9]+}/comments", 'WineController@commentThisWine');


//PUT	/api/wines/10/comments/3
//{ "content" : "some new content" }



//DELETE	/api/wines/10/comments/3



//POST	/api/wines/10/pictures
//FormData



//DELETE	/api/wines/10/pictures/2



//GET	/api/wines/10/pictures
//Authorization


