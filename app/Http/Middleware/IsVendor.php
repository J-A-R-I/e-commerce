<?php

namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class IsVendor
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || (! $user->isVendor() && ! $user->isAdmin())) {
            abort(403);
        }
        $store = $request->route('store');
        if (is_string($store)) {
            $store = Store::where('slug', $store)->firstOrFail();
        }
        if ($store instanceof Store && (int) $store->user_id !== (int) $user->id && ! $user->isAdmin()) {
            abort(403, 'Je hebt geen toegang tot de winkel van een andere verkoper.');
        }
        if ($store instanceof Store) {
            URL::defaults(['store' => $store->slug]);
        }

        return $next($request);
    }
}
