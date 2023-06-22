<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use \Stripe\Plan;
use App\Models\Plan;
use App\Models\User;
use Auth;

class StripeController extends Controller
{
    public function create_plan()
    {
        // $stripe = new \Stripe\StripeClient('sk_test_51KFMekKLHmQr7DxL5FzMhvKdkUvDmTdpVDhnvUI3pdHV4gcVXeCbQlfM5vrcVVuzhArlSVdI5nrQJwCYQkwAG5fK00boovctHO');
        
        // // Create a product over stripe
        // $product_detail = $stripe->products->create([
        //     'name' => 'Standard NPO',
        // ]);

        // // create prices for the product
        // $product_id = $product_detail->id;
        // $monthly_price = $stripe->prices->create([
        //     'unit_amount' => 139*100,
        //     'currency' => 'usd',
        //     'recurring' => ['interval' => 'year'], // it defines the recurring interval
        //     'product' => $product_id,
        // ]);

        // dd($stripe->prices->all());

        $add = new Plan;
        $add->name = 'Standard NPO';
        $add->slug = 'standard_npo';
        $add->stripe_plan = 'price_1NLjN9KLHmQr7DxLMyXrP4Od';
        $add->price = 139;
        $add->description = 'Standard NPO';
        $add->save();

    }

    public function index()
    {
        $plans = Plan::get(); 

        return view("plans", compact("plans"));
    }  

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function show(Plan $plan,$platform)
    {
        $intent = auth()->user()->createSetupIntent(); 

        return view("vendor_panel.subscription", compact("plan", "intent",'platform'));
    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);  

        // $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->trialDays(90)->create($request->token);

        $user = Auth::user()->vendor;

        
        
        if($request->platform == 1) {
            # code...
            $user->andoird = 1;
            $user->ios = 0;
        }elseif($request->platform == 2) {
            # code...
            $user->andoird = 0;
            $user->ios = 1;
        }else{
            $user->andoird = 1;
            $user->ios = 1;
        }

        if($plan->id == 1) {
            # code...
            $user->list_product = 0;
            $user->profile_analytics = 0; 
        } elseif($plan->id == 2) {
            # code...
            $user->list_product = 1;
            $user->profile_analytics = 1;
        } else{
            # code...
            $user->list_product = 1;
            $user->profile_analytics = 1;
        }
        $user->subscription_id = $plan->id;
        $user->update();
 
        return redirect(route('vendor.analytics'));
    }
}
