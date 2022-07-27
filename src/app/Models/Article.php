<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'area',
        'category',
        'body',
        'can_display_id',
        'image',
        'uid',
        'ip_address'
    ];
    const UPDATED_AT = null;
    public function comments(){
        return $this->hasMany(\App\Models\Comment::class);
    }
    public function countComments(){
        return $this->comments()->count();
    }
    public function goods(){
        return $this->hasMany(\App\Models\Good::class);
    }
    public function bads(){
        return $this->hasMany(\App\Models\Bad::class);
    }
    public function countGoods(){
        return $this->goods()->count();
    }
    //"query" => "select count(*) as aggregate from...
    //$this->goods @return Collection $this->goods() @return hasMany
    //$this->goods->count()とすると、select * で当該データをコレクションで取ってきてから、コレクションをcountする
    public function countBads() :int {
        return $this->bads()->count();
    }
    public function isGoodedBy($uid) :bool{
        return $this->goods()->where('uid',$uid)->count()>0 ? true : false; 
    }
    public function isBadedBy($uid) :bool {
        return $this->bads()->where('uid',$uid)->count() ? true : false; 
    }
}
