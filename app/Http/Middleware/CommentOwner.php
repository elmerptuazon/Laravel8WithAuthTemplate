<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Post;

class CommentOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->post->author == Auth::user()->name || $request->comment->author == Auth::user()->name) {
            return $next($request);
        }

        abort(403, 'Only post or comment owner can do this operation.');
    }
}
