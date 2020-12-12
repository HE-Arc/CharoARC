<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Match extends Model
{
    use HasFactory;


    protected $table='matchs';//to fix issue with select * from matches

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id1',
        'user_id2',
        'status_user1',
        'status_user2',
        'is_done',
    ];

    public function toString(){
        return  'user_id1 : '.$this->user_id1.' user_id2 : '.$this->user_id2.' status_user1 : '.$this->status_user1.' status_user2 : '.$this->status_user2.' is_done : '.$this->is_done;
    }

    public function getUserNameTargetFromIdLogged($userId){
        if($userId==$this->user_id2)
            return User::getUserById($this->user_id1)->name;
        if($userId==$this->user_id1)
            return User::getUserById($this->user_id2)->name;
    }

    public function toBeDisplayed($currentUserId){
        return(($currentUserId== $this->user_id1 && $this->status_user1 == true) || ( $currentUserId== $this->user_id2 && $this->status_user2 == true));
    }

    public function getTargetUserId($userId){
        if($userId==$this->user_id2)
            return $this->user_id1;
        if($userId==$this->user_id1)
            return $this->user_id2;
    }
    
    public function getTargetImage($userId){
        if($userId==$this->user_id2)
            return User::getUserById($this->user_id1);
        if($userId==$this->user_id1)
            return User::getUserById($this->user_id2);

    }

    public  function getMatchTextStatus(){
        if($this->status_user2==1 && $this->status_user1==1)
            return 'Match Validated';
        if($this->is_done==1 && ($this->status_user2==0 || $this->status_user1==0))
            return 'Match Aborted';
        return 'Pending Match';
    } 

    //static

    public static function allMatchs()
    {
        return Match::all();
    }  
    public static function getMatchById($id){
        return Match::find($id);
    }
    public static function getAllMatchByUser($userId){
        $allMatchs=Match::allMatchs();
        $stock=[];
        $var=0;
        foreach($allMatchs as $m){
            if($m->user_id1==$userId || $m->user_id2==$userId ){
                $stock[$var++]=$m;       
            }
        }
        return $stock;
    }


}
