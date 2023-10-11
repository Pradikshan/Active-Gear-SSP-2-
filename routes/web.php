<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerInquiryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\rewardsprogramController;
use App\Http\Controllers\giftcardController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerUserAccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Requests\UpdaterewardsprogramRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth:sanctum', 'can:admin-access'])->group(function () {

    Route::get('/user_add', function () {
        return view('user_add');
    });
   
    Route::get('/admin_main', function () {
        return view('admin_main');
    });

    Route::get('/user_manage', function () {
        return view('user_manage');
    });

    Route::get('/user_edit', function () {
        return view('user_edit');
    });


    //CREATE
    Route::post('/user_add', [UserAccountController::class, 'createUser'])->name('user_add');

    //READ
    Route::get('/admin_main', [AdminDashboardController::class, 'displayData']);
    Route::get('/customer_manage', [AdminDashboardController::class, 'displayCustomerInfo']);
    Route::get('/user_manage', [UserAccountController::class, 'retrieveEmployeeAccountInfo']); 

    //UPDATE
    Route::get('/user_edit/{id}', [UserAccountController::class, 'edit'])->name('user_edit');
    Route::put('/user_manage/{id}', [UserAccountController::class, 'update'])->name('user_manage');

    //DELETE
    Route::get('/deactivate_user/{id}', [UserAccountController::class, 'deactivateEmployeeUserAccount'])->name('deactivate_user');



});


Route::middleware(['auth:sanctum', 'can:admin-access, manager-access'])->group(function () {

    Route::get('/product_add', function () {
        return view('product_add');
    });

    Route::get('/supplier_add', function () {
        return view('supplier_add');
    });

    Route::get('/employee_add', function () {
        return view('employee_add');
    });

    Route::get('/reward_add', function () {
        return view('reward_add');
    });

    Route::get('/gift_add', function () {
        return view('gift_add');
    });

    Route::get('/customer_add', function () {
        return view('customer_add');
    });
    


    Route::get('/product_edit', function () {
        return view('product_edit');
    });

    Route::get('/supplier_edit', function () {
        return view('supplier_edit');
    });

    Route::get('/employee_edit', function () {
        return view('employee_edit');
    });

    Route::get('/reward_edit', function () {
        return view('reward_edit');
    });

    Route::get('/gift_edit', function () {
        return view('gift_edit');
    });

    Route::get('/customer_edit', function () {
        return view('customer_edit');
    });
    
    


    Route::get('/product_manage', function () {
        return view('product_manage');
    });

    Route::get('/employee_manage', function () {
        return view('employee_manage');
    });

    Route::get('/supplier_manage', function () {
        return view('supplier_manage');
    });

    Route::get('/customer_manage', function () {
        return view('customer_manage');
    });

    Route::get('/reward_manage', function () {
        return view('reward_manage');
    });

    Route::get('/gift_manage', function () {
        return view('gift_manage');
    });



    Route::get('/customer_manage', function () {
        return view('customer_manage');
    });


    //CREATE
    Route::post('/product_add', [ProductController::class, 'store']);
    Route::post('/supplier_add', [SupplierController::class, 'store']);
    Route::post('/employee_add', [employeeController::class, 'store']);
    Route::post('/gift_add', [giftcardController::class, 'store']);
    Route::post('/reward_add', [rewardsprogramController::class, 'store']);
    Route::post('/customer_add', [CustomerController::class, 'store']);


    //READ
    Route::get('/supplier_manage', [SupplierController::class, 'index']);
    Route::get('/employee_manage', [employeeController::class, 'index']);
    Route::get('/reward_manage', [rewardsprogramController::class, 'index']);
    Route::get('/gift_manage', [giftcardController::class, 'index']);
    Route::get('/customer_manage', [UserAccountController::class, 'retrieveAccountInfo']);


    //UPDATE
    Route::put('/product_manage/{id}', [ProductController::class, 'update'])->name('product_manage');
    Route::put('/employee_manage/{id}', [employeeController::class, 'update'])->name('employee_manage');
    Route::put('/reward_manage/{id}', [rewardsprogramController::class, 'update'])->name('reward_manage');
    Route::put('/gift_manage/{id}', [giftcardController::class, 'update'])->name('gift_manage');
    Route::put('/supplier_manage/{id}', [SupplierController::class, 'update'])->name('supplier_manage');
    Route::put('/customer_manage/{id}', [CustomerController::class, 'update'])->name('customer_manage');

    Route::get('/product_edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
    Route::get('/employee_edit/{id}', [employeeController::class, 'edit'])->name('employee_edit');
    Route::get('/reward_edit/{id}', [rewardsprogramController::class, 'edit'])->name('reward_edit');
    Route::get('/gift_edit/{id}', [giftcardController::class, 'edit'])->name('gift_edit');
    Route::get('/supplier_edit/{id}', [SupplierController::class, 'edit'])->name('supplier_edit');
    Route::get('/customer_edit/{id}', [CustomerController::class, 'edit'])->name('customer_edit');


    //DELETE
    Route::get('/deactivate_product/{id}', [ProductController::class, 'deactivateProduct'])->name('deactivate_product');
    Route::get('/deactivate_reward/{id}', [rewardsprogranController::class, 'deactivateReward'])->name('deactivate_reward');
    Route::get('/deactivate_giftcard/{id}', [giftcardController::class, 'deactivateGiftCard'])->name('deactivate_giftcard');
    Route::get('/deactivate_supplier/{id}', [SupplierController::class, 'deactivateSupplier'])->name('deactivate_supplier');
    Route::get('/deactivate_employee/{id}', [employeeController::class, 'deactivateEmployee'])->name('deactivate_employee');
    Route::get('/deactivate_customer/{id}', [CustomerController::class, 'deactivateCustomer'])->name('deactivate_customer');
});


Route::middleware(['auth:sanctum', 'can:admin-access, manager-access, inventory-access'])->group(function () {

    Route::get('/product_manage', function () {
        return view('product_manage');
    });

    //READ
    Route::get('/product_manage', [ProductController::class, 'index']);
});



Route::middleware(['auth:sanctum', 'can:customer-access'])->group(function () {
    Route::get('/purchase_history', function () {
        return view('purchase_history');
    });

    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/success', [ProductController::class, 'success'])->name('success');
    Route::get('/cancel', [ProductController::class, 'cancel'])->name('cancel');

    Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add'); 

    Route::get('/purchase_history', [PurchaseHistoryController::class, 'index']);
});



// Route::get('/', function () {
//     return view('main');
// });

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/feedback', function () {
    return view('feedback');
});



Route::get('/customer_user_add', function () {
    return view('customer_user_add');
});

Route::get('/product_category_activewear', function () {
    return view('product_category_activewear');
});

Route::get('/product_category_gymacc', function () {
    return view('product_category_gymacc');
});

Route::get('/product_category_gymeq', function () {
    return view('product_category_gymeq');
});

Route::get('/product_category_sportseq', function () {
    return view('product_category_sportseq');
});



Route::post('/feedback', [CustomerInquiryController::class, 'store']);


Route::post('/customer_user_add', [CustomerUserAccountController::class, 'createCustomerUser'])->name('customer_user_add');





Route::post('/login', [LoginController::class, 'login']);






Route::get('/main', [ProductController::class, 'mainview']);
Route::get('/product_category_activewear', [ProductController::class, 'productActiveWear']);
Route::get('/product_category_gymacc', [ProductController::class, 'productGymAccessories']);
Route::get('/product_category_gymeq', [ProductController::class, 'productGymEquipment']);
Route::get('/product_category_sportseq', [ProductController::class, 'productSportsEquipment']);



// Route::get('/customer_manage', [CustomerController::class, 'index']);



//Deleting table data

//Route::delete('/product_manage', [ProductController::class, 'delete']);
//Route::delete('/supplier_manage', [SupplierController::class, 'delete']);
//Route::delete('/employee_manage', [employeeController::class, 'delete']);

//Route::delete('/reward_manage', [rewardsprogramController::class, 'delete']);
//Route::delete('/gift_manage', [giftcardController::class, 'delete']);





Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth', 'admin'])->name('admin_')->prefix('admin')->group(function() {
//     Route::get('/admin_main',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('main');
// });
