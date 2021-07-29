<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsCategory = [
        1 => [
            'title' => 'Политика'
        ] ,
        2 => [
            'title' => 'Спорт'
        ] ,
        3 => [
            'title' => 'IT'
        ]
    ];

    private $news = [
        1 => [
            'title' => 'news 1'
        ] ,
        2 => [
            'title' => 'news 2'
        ]
    ];


    public function index()
    {
        return view('news.index', ['newsCategory' => $this->newsCategory]);
    }

    public function newsCategory($id)
    {
        return view('news.category', ['id' => $id, 'news' => $this->news]);
    }

    public function newsCard($category, $id)
    {
        return view('news.cart', ['id' => $id, 'category' => $category]);
    }
}
