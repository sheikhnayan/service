<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

    // public function subscription(Request $request)
    // {

    //     $customer_id = Auth::user()->vendor->customer_id;
    //     // dd($request->all());


    //     $apiURL = 'https://connect.squareupsandbox.com/v2/customers/'.$customer_id.'/cards';

    //         $postInput = [
    
    //             'card_nonce' => $request->sourceId,
    
    //         ];
    
      
    
    //         $headers = [
    
    //             'Square-Version' => '2023-06-08',

    //             'Authorization' => 'Bearer EAAAECLQEKR3dVZ6PgGI6VoZa1LzXaqgtqjgKg_Re-NyPafaFVoBhcsmdxLCBcQU'
    
    //         ];
    
      
    
    //         $response = Http::withHeaders($headers)->withOptions(["verify"=>false])->post($apiURL, $postInput);
    
      
    
    //         $statusCode = $response->status();
    
    //         $responseBody = json_decode($response->getBody(), true);

    //         // $customer_id = $responseBody['customer']['id'];


    //         $card_id = $responseBody['card']['id'];

    //         $card_id = str_replace('ccof:','',$card_id);
            
            
    //         $plan = Plan::where('stripe_plan',$request->plan_id)->first();  
            

    //         $vendor_details = Auth::user()->vendor;
    //         $vendor_details->card_id = $card_id;
    //         $vendor_details->subscription_id = $plan->id;
    //         $vendor_details->update();

    //         // $apiURL = 'https://connect.squareupsandbox.com/v2/subscriptions';

    //         // $postInput = [
    
    //         //     'customer_id' => $customer_id,

    //         //     'plan_variation_id' => $request->plan_id,

    //         //     'location_id' => 'L46AAJ77JKQ5D',

    //         //     'card_id' => $responseBody['card']['id'],

    //         //     'idempotency_key' => 'asjkdhjkh2131k2j311k2j3kj1h23asdf',

    //         //     "phases" => [
    //         //         [
    //         //           "ordinal" => 0,
    //         //           "order_template_id" => "x7ClfqqNapjeDMvrQOZhbgVFVKFZY"
    //         //         ],
    //         //         [
    //         //           "ordinal" => 1,
    //         //           "order_template_id" => "sTzXhfu3E2GtjXQHvpnITivAXna1z"
    //         //         ]
    //         //       ]
    
    //         // ];
    
      
    
    //         // $headers = [
    
    //         //     'Square-Version' => '2023-06-08',

    //         //     'Authorization' => 'Bearer EAAAECLQEKR3dVZ6PgGI6VoZa1LzXaqgtqjgKg_Re-NyPafaFVoBhcsmdxLCBcQU'
    
    //         // ];
    
      
    
    //         // $response = Http::withHeaders($headers)->withOptions(["verify"=>false])->post($apiURL, $postInput);
    
      
    
    //         // $statusCode = $response->status();
    
    //         // $responseBody = json_decode($response->getBody(), true);

    //         // dd($responseBody);

    //     $user = Auth::user()->vendor;

        
        
    //     if($request->platform == 1) {
    //         # code...
    //         $user->andoird = 1;
    //         $user->ios = 0;
    //     }elseif($request->platform == 2) {
    //         # code...
    //         $user->andoird = 0;
    //         $user->ios = 1;
    //     }else{
    //         $user->andoird = 1;
    //         $user->ios = 1;
    //     }

    //     if($plan->id == 1) {
    //         # code...
    //         $user->list_product = 0;
    //         $user->profile_analytics = 0; 
    //     } elseif($plan->id == 2) {
    //         # code...
    //         $user->list_product = 1;
    //         $user->profile_analytics = 1;
    //     } else{
    //         # code...
    //         $user->list_product = 1;
    //         $user->profile_analytics = 1;
    //     }
    //     $user->subscription_id = $plan->id;
    //     $user->update();
 
    //     // return redirect(route('vendor.analytics'));

    //     return true;
    // }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);  

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->trialDays(90)->create($request->token);

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
    




    public static function square_json(){
          $square = array(    
            "idempotency_key" => uniqid(),    
            "order" => array(      
                "reference_id" => (string)$orderID,      
                "line_items" => array(        
                    // List each item in the order as an individual line item       
                     array(         
                         "name" => "Item Name",          
                         "quantity" => 3,          
                         "base_price_money" => array(            
                            "amount" => 5,            
                            "currency" => "CAD"          
                        ),        
                    ),        
                    array(          
                        "name" => "Item Name 2",          
                        "quantity" => 3,          
                        "base_price_money" => array(            
                            "amount" => 6,            
                            "currency" => "CAD"          
                        ),        
                    ),      
                    )    
                    )  
                ); 

                $json = json_encode($square);  

                return $json;
            }
}
