<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'id',
        'title',
        'content',
        'active',
        'category_id',
        'publish_date'
    ];

}
