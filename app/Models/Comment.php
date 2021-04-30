<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wine_id', 'user_id', 'comment',
    ];

    protected $table = 'comments';


    public function wine()
    {
        return $this->belongsTo('App\Models\Wine');
    }

}

