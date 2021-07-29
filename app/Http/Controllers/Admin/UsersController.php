<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $user = User::query()
            ->paginate(5);
        return view('admin.users.index', ['user' => $user]);
    }
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            /** @var User $model */
            $model = User::find($request->input('id'));
            $model->fill($request->all());
            $model->update();

            return redirect()->route("admin::users::index");
        }

        $categories = Categories::all();
        $value = User::find($request->input('id'));
        return view("admin.users.update", ['categories' => $categories, 'value' => $value]);

    }

    public function delete($id)
    {
        User::destroy([$id]);
        return redirect()->route("admin::users::index");
    }
}
