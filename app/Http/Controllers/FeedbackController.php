<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $feedback = new Feedback();

            $feedback->fill($request->all());
            $feedback->save();


            return redirect()->route("feedback::index");
        }

        $feed = Feedback::all();
        return view('feedback', ['feedback' => $feed]);
    }
}
