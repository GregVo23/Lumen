<?php

namespace App\Http\Controllers;

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

    public function getAllWines()
    {
        $wines = DB::select('select * from wine');
        return $wines;
    }

    public function getWineById($id)
    {
        $wines = DB::select("select * from wine where id ='$id'");
        return $wines;
    }

    public function getWinesBySearch(Request $request)
    {
        $val = $request->val;
        $sort = $request->sort;
        $key = $request->key;
        $wines = DB::select("select * from wine where '$key' = '$val' order by '$sort'");

        return $wines;
    }

    public function getWineByKeyword(Request $request)
    {
        $keyword = $request->keyword;
        $wines = DB::select("select * from wine where name like '%$keyword%'");
    
        return $wines;
    }

    public function getCommentWine($id)
    {
        $comment = wine::find($id)->comment()->get();
        
        return $comment;
    }

    public function getCountries()
    {
        $winesCountries = DB::select("select distinct country from wine");
        $allCountries = [];
        foreach( $winesCountries as $winesCountry )
        {
            $allCountries[] = $winesCountry->country;
        }

        return json_encode($allCountries,JSON_FORCE_OBJECT);
    }
}
