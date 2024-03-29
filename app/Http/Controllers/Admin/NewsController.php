<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->paginate(5);
        return view('admin.news.index', ['news' => $news]);
    }

    /**
     * @method GET | POST
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            /** @var News $model */
            $model = new News();
            $model->fill($request->all());
            $model->save();

            return redirect()->route("admin::news::index");
        }

        $model = new News();
        return view("admin.news.create", ['categories' => Categories::all(), 'model' => $model]);

    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            /** @var News $model */
            $model = News::find($request->input('id'));
            $model->fill($request->all());
            $model->update();

            return redirect()->route("admin::news::index");
        }

        $categories = Categories::all();
        $value = News::find($request->input('id'));
        return view("admin.news.update", ['categories' => $categories, 'value' => $value]);

    }

    public function delete($id)
    {
        News::destroy([$id]);
        return redirect()->route("admin::news::index");
    }
}
