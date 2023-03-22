<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureClientIdIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $valid_store_client_id = config('sushi_order_system.valid_store_client_id');
        $message = 'Forbidden: 閲覧権限が無いコンテンツ';
        $description = 'client_id is invalid';

        if (! ($request->header('client-id') === $valid_store_client_id)) {
            return response()->json([
                'error' => $message,
                'error_description' => $description,
                'error_code' => Response::HTTP_FORBIDDEN,
            ], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
