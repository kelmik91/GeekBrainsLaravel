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

    public static function rules()
    {
        return [
            'title' => 'required|min:5|max:50|unique:news,title',
            'content' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'publish_date' => 'required|date'
        ];
    }

    public static function rulesUpdate()
    {
        return [
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'publish_date' => 'required|date'
        ];
    }
}
