<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;
use App\Models\Product;
use App\Models\Service;

class Preferred
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $url = Route::getRoutes()->match($request);
        $currentroute = $url->getName();

        $plan = Auth::user()->vendor->subscription_id;

        if ($plan == 2) {
            # code...
            if($currentroute == 'vendor.product.create') {
                # code...
                $check = Service::where('user_id',Auth::user()->id)->count();
    
                if ($check > 0) {
                    # code...
                    return redirect(route('subscription'));
                } else {
                    # code...
                    return $next($request);
                }
                
            } elseif($currentroute == 'vendor.service.create') {
                # code...
                $check = Product::where('user_id',Auth::user()->id)->count();
    
                if ($check > 0) {
                    # code...
                    return redirect(route('subscription'));
                } else {
                    # code...
                    return $next($request);
                }
                
            }
        }else{
            return $next($request);
        }
        
    }
}
