<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $newsCategory = Categories::all();
        return view('news.index', ['newsCategory' => $newsCategory]);
    }

    public function newsCategory($id)
    {
        $category = Categories::find($id);
        $news = News::query()->where('category_id', $id)->paginate(10);
        return view('news.category', ['category' => $category, 'news' => $news]);
    }

    public function newsCard($category, $id)
    {
        $news = News::find($id);
        $category = Categories::find($category);
        return view('news.cart', ['category_name' => $category, 'news' => $news]);
    }
}
