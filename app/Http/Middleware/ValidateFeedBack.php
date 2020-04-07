<?php

namespace App\Http\Middleware;

use App\Models\Feedback;
use App\Models\News;
use Closure;
use Illuminate\Support\Facades\Validator;

class ValidateFeedBack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validator = Validator::make($request->all(), Feedback::rules());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
