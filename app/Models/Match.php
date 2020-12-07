<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id1',
        'user_id2',
        'status_user1',
        'status_user2'
    ];

    public static function allMatch()
    {
        return Match::all();
    }  
    public static function getMatchById($id){
        return Match::find($id);
    }
}
