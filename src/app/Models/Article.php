<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use PhpParser\Node\Expr\Cast\Bool_;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
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
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
    public function countComments()
    {
        return $this->comments()->count();
    }
    public function goods()
    {
        return $this->hasMany(\App\Models\Good::class);
    }
    public function bads()
    {
        return $this->hasMany(\App\Models\Bad::class);
    }
    public function countGoods(): int
    {
        return $this->goods()->count();
    }
    //"query" => "select count(*) as aggregate from...
    //$this->goods @return Collection $this->goods() @return hasMany
    //$this->goods->count()とすると、select * で当該データをコレクションで取ってきてから、コレクションをcountする
    public function countBads(): int
    {
        return $this->bads()->count();
    }
    public function isGoodedBy($uid): bool
    {
        return $this->goods()->where('uid', $uid)->count() > 0 ? true : false;
    }
    public function isBadedBy($uid): bool
    {
        return $this->bads()->where('uid', $uid)->count() ? true : false;
    }
    public function scopeSearch(Builder $query, array $params): Builder
    {
        if (!empty($params['area'])) $query->where('area', $params['area']);
        if (!empty($params['category'])) $query->where('category', $params['category']);
        if (!empty($params['keyword'])) {
            // $query->where('title',$params['keyword'])->orWhere('body', $params['keyword']);
            // クエリ；select * from `articles` where `area` = ? and `category` = ? and `title` = ? or `body` = ?
            //　orの条件は入れ子にしたいが、メソッドチェーンを繋げるだけでは入れ子にできない
            // where内でクロージャを定義して、その中でwhereを書く
            // select * from `articles` where `area` = ? and `category` = ? and (`title` = ? or `body` = ?)
            $keyword = '%' . addcslashes($params['keyword'], '%_\\') . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', $keyword)->orWhere('body', 'LIKE', $keyword);
            });
        }
        $query->withCount(['comments', 'goods', 'bads']);
        isset($params['popularity']) ? $query->orderBy('goods_count', 'desc') : $query->orderBy('created_at', 'desc');
        return $query;
    }
}
