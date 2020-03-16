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
        echo view('welcome');

        foreach ($this->newsCategory as $key => $value){
            $url = route('newsCategory', ['id' => $value['title']]);
            echo "<div><a href=\"{$url}\" >{$value['title']}</a></div>";
        }
    }

    public function newsCategory($id)
    {
        echo view('welcome');

        echo "Новости раздела {$id}";

        foreach ($this->news as $key => $value){
            $url = route('newsCard', ['category' => $id, 'id' => $key]);
            echo "<div><a href=\"{$url}\" >{$value['title']}</a></div>";
        }
    }

    public function newsCard($category, $id)
    {
        echo view('welcome');

        echo "{$category} <hr>";
        echo "single news {$id}";
    }
}
