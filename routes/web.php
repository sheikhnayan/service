<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor_panel\IndexController;
use App\Http\Controllers\Vendor_panel\ProductController;
use App\Http\Controllers\Vendor_panel\ServiceController;
use App\Http\Controllers\Vendor_panel\FoodMenuController;
use App\Http\Controllers\Vendor_panel\EventController;
use App\Http\Controllers\Vendor_panel\CampaignController;


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\admin\ServiceSubCategoryController;
use App\Http\Controllers\admin\FoodMenuCategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\NPOController;
use App\Http\Controllers\admin\StripeController;

use App\Http\Controllers\user\UserController as User;


use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        # code...
        if (Auth::user()->type == 'admin') {
            # code...
            return redirect()->intended(RouteServiceProvider::Admin);
        } else {
            # code...
            return redirect()->intended(RouteServiceProvider::Vendor);
        }
        
        
    } else {
        # code...
        return redirect()->intended(RouteServiceProvider::USERLOGIN);
    }
});

Route::prefix('/vendor')->middleware('auth','vendor','check_subscription')->name('vendor.')->group(function () {

    Route::get('/analytics',[IndexController::class,'analytics'])->name('analytics')->middleware('standard');

    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/index', [ProductController::class,'index'])->name('index');
        Route::get('/create', [ProductController::class,'create'])->name('create')->middleware('standard','preferred');
        Route::post('/store', [ProductController::class,'store'])->name('store');
        Route::get('/show/{id}', [ProductController::class,'show'])->name('show');
        Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class,'update'])->name('update');
        Route::get('/review/{id}', [ProductController::class,'review'])->name('review');
        Route::get('get-product-sub-category/{id}', [ProductController::class,'get_product_sub_category'])->name('get-product-sub-category');

    });

    Route::prefix('/service')->name('service.')->group(function () {
        Route::get('/index', [ServiceController::class,'index'])->name('index');
        Route::get('/create', [ServiceController::class,'create'])->name('create')->middleware('standard','preferred');
        Route::post('/store', [ServiceController::class,'store'])->name('store');
        Route::get('/show/{id}', [ServiceController::class,'show'])->name('show');
        Route::get('/edit/{id}', [ServiceController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [ServiceController::class,'update'])->name('update');
        Route::get('/review/{id}', [ServiceController::class,'review'])->name('review');
        Route::get('get-service-sub-category/{id}', [ServiceController::class,'get_service_sub_category'])->name('get-service-sub-category');

    });

    Route::prefix('/food-menu')->name('food-menu.')->group(function () {
        Route::get('/index', [FoodMenuController::class,'index'])->name('index');
        Route::get('/create', [FoodMenuController::class,'create'])->name('create')->middleware('standard');
        Route::post('/store', [FoodMenuController::class,'store'])->name('store');
        Route::get('/show/{id}', [FoodMenuController::class,'show'])->name('show');
        Route::get('/edit/{id}', [FoodMenuController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [FoodMenuController::class,'update'])->name('update');
        Route::get('/review', [FoodMenuController::class,'review'])->name('review');

    });

    Route::prefix('/event')->name('event.')->group(function () {
        Route::get('/index', [EventController::class,'index'])->name('index');
        Route::get('/create', [EventController::class,'create'])->name('create');
        Route::post('/store', [EventController::class,'store'])->name('store');
        Route::get('/show/{id}', [EventController::class,'show'])->name('show');
        Route::get('/edit/{id}', [EventController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [EventController::class,'update'])->name('update');
        Route::get('/review', [EventController::class,'review'])->name('review');

    });

    Route::prefix('/campaign')->name('campaign.')->group(function () {
        Route::get('/index', [CampaignController::class,'index'])->name('index');
        Route::get('/create', [CampaignController::class,'create'])->name('create');
        Route::post('/store', [CampaignController::class,'store'])->name('store');
        Route::get('/show/{id}', [CampaignController::class,'show'])->name('show');
        Route::get('/edit/{id}', [CampaignController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [CampaignController::class,'update'])->name('update');
        Route::get('/review', [CampaignController::class,'review'])->name('review');

    });

});


Route::prefix('/admin')->middleware('auth','admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/support',[AdminController::class,'support'])->name('support');

    Route::prefix('/meta-data')->name('meta-data.')->group(function () {

        Route::get('/',[AdminController::class,'meta_data'])->name('index');

        Route::prefix('/country')->name('country.')->group(function () {
            Route::get('create', [CountryController::class,'create'])->name('create');
            Route::post('store', [CountryController::class,'store'])->name('store');
            Route::get('edit/{id}', [CountryController::class,'edit'])->name('edit');
            Route::post('update/{id}', [CountryController::class,'update'])->name('update');
            Route::get('delete/{id}', [CountryController::class,'destroy'])->name('destroy');
        });

        Route::prefix('/state')->name('state.')->group(function () {
            Route::get('create', [StateController::class,'create'])->name('create');
            Route::post('store', [StateController::class,'store'])->name('store');
            Route::get('edit/{id}', [StateController::class,'edit'])->name('edit');
            Route::post('update/{id}', [StateController::class,'update'])->name('update');
            Route::get('delete/{id}', [StateController::class,'destroy'])->name('destroy');
        });

        Route::prefix('/product-category')->name('product-category.')->group(function () {
            Route::get('create', [ProductCategoryController::class,'create'])->name('create');
            Route::post('store', [ProductCategoryController::class,'store'])->name('store');
            Route::get('edit/{id}', [ProductCategoryController::class,'edit'])->name('edit');
            Route::post('update/{id}', [ProductCategoryController::class,'update'])->name('update');
            Route::get('delete/{id}', [ProductCategoryController::class,'destroy'])->name('destroy');
        });

        Route::prefix('/product-sub-category')->name('product-sub-category.')->group(function () {
            Route::get('create', [ProductSubCategoryController::class,'create'])->name('create');
            Route::post('store', [ProductSubCategoryController::class,'store'])->name('store');
            Route::get('edit/{id}', [ProductSubCategoryController::class,'edit'])->name('edit');
            Route::post('update/{id}', [ProductSubCategoryController::class,'update'])->name('update');
            Route::get('delete/{id}', [ProductSubCategoryController::class,'destroy'])->name('destroy');
        });

        Route::prefix('/service-category')->name('service-category.')->group(function () {
            Route::get('create', [ServiceCategoryController::class,'create'])->name('create');
            Route::post('store', [ServiceCategoryController::class,'store'])->name('store');
            Route::get('edit/{id}', [ServiceCategoryController::class,'edit'])->name('edit');
            Route::post('update/{id}', [ServiceCategoryController::class,'update'])->name('update');
            Route::get('delete/{id}', [ServiceCategoryController::class,'destroy'])->name('destroy');
        });

        Route::prefix('/service-sub-category')->name('service-sub-category.')->group(function () {
            Route::get('create', [ServiceSubCategoryController::class,'create'])->name('create');
            Route::post('store', [ServiceSubCategoryController::class,'store'])->name('store');
            Route::get('edit/{id}', [ServiceSubCategoryController::class,'edit'])->name('edit');
            Route::post('update/{id}', [ServiceSubCategoryController::class,'update'])->name('update');
            Route::get('delete/{id}', [ServiceSubCategoryController::class,'destroy'])->name('destroy');
        });

        Route::prefix('/food-menu-category')->name('food-menu-category.')->group(function () {
            Route::get('create', [FoodMenuCategoryController::class,'create'])->name('create');
            Route::post('store', [FoodMenuCategoryController::class,'store'])->name('store');
            Route::get('edit/{id}', [FoodMenuCategoryController::class,'edit'])->name('edit');
            Route::post('update/{id}', [FoodMenuCategoryController::class,'update'])->name('update');
            Route::get('delete/{id}', [FoodMenuCategoryController::class,'destroy'])->name('destroy');
        });
    });

    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class,'index'])->name('index');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class,'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class,'destroy'])->name('delete');
    });
    Route::prefix('plan')->name('user.')->group(function () {
        Route::get('/standard', [UserController::class,'standard'])->name('standard');
        Route::get('/preferred', [UserController::class,'preferred'])->name('preferred');
        Route::get('/premium', [UserController::class,'premium'])->name('premium');
    });

    Route::prefix('npo')->name('npo.')->group(function () {
        Route::get('/', [NPOController::class,'index'])->name('index');
    });
    
});


Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [IndexController::class,'profile'])->name('profile');
    Route::post('/profile-update', [IndexController::class,'profile_update'])->name('profile-update');
    Route::get('/get-states/{country}', [IndexController::class,'get_states'])->name('get-states');
    Route::get('/support', [IndexController::class,'support'])->name('support');
    Route::post('/support', [IndexController::class,'support_submit'])->name('support');
    Route::get('/notification', [IndexController::class,'notification']);
    // Route::get('/preferred-vendor', [IndexController::class,'preferred_vendor']);
    Route::get('/subscription', [IndexController::class,'subscription'])->name('subscription');
    Route::get('/otp', [IndexController::class,'otp'])->name('otp');
    Route::get('/final-registration', [IndexController::class,'final_registration'])->name('final-registration');
    Route::post('/final-registration', [RegisteredUserController::class,'final_registration'])->name('final-registration');
    
    Route::get('/review', [IndexController::class,'review']);
    
    Route::get('/plan', [StripeController::class,'create_plan'])->name('plan');
    
    Route::get('plans', [StripeController::class, 'index']);
    Route::get('plan/{plan}/{platform}', [StripeController::class, 'show'])->name("plans.show");
    Route::post('subscription', [StripeController::class, 'subscription'])->name("subscription.create");
});

Route::prefix('/user')->name('user.')->middleware('auth')->group(function () {

    Route::get('/index',[User::class,'index'])->name('index');

    Route::get('category/{id}',[User::class,'category'])->name('category');

    Route::prefix('/campaign')->name('campaign.')->group(function () {
        
        Route::get('/',[User::class,'campaign'])->name('index');
        Route::get('/campaign/{id}',[User::class,'campaign_show'])->name('show');
        Route::get('/campaign/profile/{id}',[User::class,'campaign_profile'])->name('profile');
        Route::get('/campaign/all/{id}',[User::class,'campaign_all'])->name('all');
        
    });

    Route::prefix('/event')->name('event.')->group(function () {
        
        Route::get('/',[User::class,'event'])->name('index');
        Route::get('/event/{id}',[User::class,'event_show'])->name('show');
        Route::get('/event/profile/{id}',[User::class,'event_profile'])->name('profile');
        Route::get('/event/all/{id}',[User::class,'event_all'])->name('all');
        
    });

    Route::prefix('/product')->name('product.')->group(function () {
        
        Route::get('/',[User::class,'product'])->name('index');
        Route::get('/product/{id}',[User::class,'product_show'])->name('show');
        Route::get('/product/profile/{id}',[User::class,'product_profile'])->name('profile');
        Route::get('/product/all/{id}',[User::class,'product_all'])->name('all');
        
    });

    Route::prefix('/service')->name('service.')->group(function () {
        
        Route::get('/',[User::class,'service'])->name('index');
        Route::get('/service/{id}',[User::class,'service_show'])->name('show');
        Route::get('/service/profile/{id}',[User::class,'service_profile'])->name('profile');
        Route::get('/service/all/{id}',[User::class,'service_all'])->name('all');
        
    });

    Route::prefix('/food')->name('food.')->group(function () {
        
        Route::get('/',[User::class,'food'])->name('index');
        Route::get('/food/{id}',[User::class,'food_show'])->name('show');
        Route::get('/food/profile/{id}',[User::class,'food_profile'])->name('profile');
        Route::get('/food/all/{id}',[User::class,'food_all'])->name('all');
        
    });
    
});


require __DIR__.'/auth.php';