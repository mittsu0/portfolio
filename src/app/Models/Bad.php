<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bad extends Model
{
    use HasFactory;
    protected $fillable=[
        'article_id',
        'uid'
    ];
    const UPDATED_AT = null;
}
