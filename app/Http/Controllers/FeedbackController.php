<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /** @method GET | POST */

    public function index()
    {
        $feed = Feedback::all();
        return view('feedback', ['feedback' => $feed]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            /** @var Feedback $feedback */
            $feedback = new Feedback();
            $feedback->fill($request->all());
            $feedback->save();

            return redirect()->route("feedback");
        }

        $model = new Feedback();
        return view('feedbackCreate', ['model' => $model]);
    }
}
