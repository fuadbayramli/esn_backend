<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiResponser;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AccessDenied
{
    use ApiResponser;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        if ((int)$request->id !== Auth::user()->getAuthIdentifier()) {
            return $this->errorResponse(__('http.unauthorized'), [], ResponseAlias::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
