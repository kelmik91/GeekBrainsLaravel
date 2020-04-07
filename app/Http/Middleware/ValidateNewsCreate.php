<?php

namespace App\Http\Middleware;

use App\Models\News;
use Closure;
use Illuminate\Support\Facades\Validator;

class ValidateNewsCreate
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
        $validator = Validator::make($request->all(), News::rules());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
