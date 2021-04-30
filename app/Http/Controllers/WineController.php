<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Wine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;
use Illuminate\Contracts\Support\Arrayable;

class WineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retrouve les vins de la base de données.
     *
     * @return $wines
     */
    public function getAllWines()
    {
        $wines = DB::select('select * from wine');
        return $wines;
    }

    /**
     * Retrouve le vin dont l'id correspond à $id.
     *
     * @return $wines
     */
    public function getWineById($id)
    {
        $wines = DB::select("select * from wine where id ='$id'");
        return $wines;
    }

    /**
     * Filtre les vins de France triés par année
     *
     * @return $wines
     */
    public function getWinesBySearch(Request $request)
    {
        $val = $request->val;
        $sort = $request->sort;
        $key = $request->key;
        $wines = DB::select("select * from wine where '$key' = '$val' order by '$sort'");

        return $wines;
    }

    /**
     * Recherche les vins dont le nom contient ‘x’.
     *
     * @return $wines
     */
    public function getWineByKeyword(Request $request)
    {
        $keyword = $request->keyword;
        $wines = DB::select("select * from wine where name like '%$keyword%'");
    
        return $wines;
    }

    /**
     * Retrouve les commentaires du vin x.
     *
     * @return $wines
     */
    public function getCommentWine($id)
    {
        $comment = wine::find($id)->comment()->get();
        
        return $comment;
    }

    /**
     * Retrouve les différents pays.
     *
     * @return $wines
     */
    public function getCountries()
    {
        $winesCountries = DB::select("select distinct country from wine");

        return $winesCountries;
    }

    /**
     * Retrouve le nombre de likes du vin x.
     *
     * @return $wines
     */
    public function getNbLike($id)
    {
        $nbLike = wine::find($id)->wineLike()->get();
        $total = ['total' => $nbLike->count()];

        return $total;
    }

    /**
     * Retrouve les vins préférés de l’utilisateur x.
     *
     * @return $wines
     */
    public function getLikeWine($id)
    {
        $likes = user::find($id)->userLike()->get();
        $wines = [];
        foreach($likes as $like)
        {
            $wines = DB::select("select * from wine where id ='$like->wine_id'");
        }
        return $wines;
    }

    /**
     * Ajoute ou retire le vin 10 parmi ses préférés.
     *
     * @return $wines
     */
    public function likeThisWine($id)
    {
        //
    }
}
