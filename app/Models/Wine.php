<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'year', 'grapes', 'country', 'description', 'picture',
    ];

    protected $table = 'wine';

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getAll()
    {
        return $this::all();
    }

}
