<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public function comments(): HasMany
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
    public function countComments(): int
    {
        return $this->comments()->count();
    }
    public function goods(): HasMany
    {
        return $this->hasMany(\App\Models\Good::class);
    }
    public function bads(): HasMany
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
