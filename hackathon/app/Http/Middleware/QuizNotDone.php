<?php

namespace App\Http\Middleware;

use App\Models\Response;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as IlluminateResponse;
use Illuminate\Support\Facades\Auth;

class QuizNotDone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): IlluminateResponse
    {
        $responses = Response::where('user_id', '=', Auth::user()->id)->get();

        if (count($responses) > 0) {
            foreach($responses as $response) {
                if ($response->question->quiz_id == $request->id) {
                    return redirect('/silabus');
                }
            }
        }

        return $next($request);
    }
}
