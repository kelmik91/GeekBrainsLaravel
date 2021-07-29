<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'theme',
        'message'
    ];

    public static function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'theme' => 'required|alpha_dash|min:5|max:50',
            'message' => 'required|min:10'
        ];
    }
}
