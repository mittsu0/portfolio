<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'comment',
        'can_display_id',
        'uid',
        'ip_address'
    ];
    const UPDATED_AT = null;
}
