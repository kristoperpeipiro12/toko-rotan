<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckSelectedItems
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('selected_items') || empty($request->input('selected_items'))) {
            // return redirect()->back()->with('error', 'Silakan pilih minimal satu item sebelum checkout.');
            throw new NotFoundHttpException();
        }

        return $next($request);
    }
}
