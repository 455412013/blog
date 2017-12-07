<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $fillable=['title','body','user_id'];

    public function hasManyComments(){
       return $this->hasMany(Comment::class);
    }

    public function belongsToUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function addComment($body)
    {



        $user_id=1;
        $this->hasManyComments()->create(compact('body','user_id'));
//        Comment::create([
//            'body'=>$body,
//            'post_id'=>$this->id,
//            'user_id'=>'1',
//        ]);

    }

    public function scopeFilter($query,$filter)
    {
        if($filter){
            if($month=$filter['month']){
                $query->whereMonth('created_at',Carbon::parse($month)->month);
            }

            if($year=$filter['year']){
                $query->whereYear('created_at',Carbon::parse($year)->year);
            }
        }

    }

    public static function archives()
    {

        return static::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')->groupBy('year','month')->orderByRaw('min(created_at) desc')->get();
    }
}
