<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'like', 'wine_id', 'user_id',
    ];

    protected $table = 'like';

    public function likeWine()
    {
        return $this->belongsTo('App\Models\Wine');
    }

    public function likeUser()
    {
        return $this->belongsTo('App\Models\User');
    }
}
