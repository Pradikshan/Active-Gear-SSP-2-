<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1.0')
	->group(function() {

		Route::controller(AuthController::class)
			//->prefix('auth')
			->group(function() {
				Route::post('/login', 'login');
			});

            

            Route::controller(ProductController::class)
			->group(function() {
                Route::get('/main', 'mainview');
                Route::get('/product_category_activewear', 'productActiveWear');
                Route::get('/product_category_gymacc', 'productGymAccessories');
                Route::get('/product_category_gymeq', 'productGymEquipment');
                Route::get('/product_category_sportseq', 'productSportsEquipment');
	        });

            Route::controller(CustomerUserAccountController::class)
			->group(function() {
                Route::post('/customer_user_add', [CustomerUserAccountController::class, 'createCustomerUser']);
	        });

            Route::middleware(['auth:sanctum', 'can:admin-access'])->group(function () {
                //CREATE
                Route::post('/user_add', [UserAccountController::class, 'createUser']);
            
                //READ
                Route::get('/admin_main', [AdminDashboardController::class, 'displayData']);
                Route::get('/customer_manage', [AdminDashboardController::class, 'displayCustomerInfo']);
                Route::get('/user_manage', [UserAccountController::class, 'retrieveEmployeeAccountInfo']); 
            
                //UPDATE
                Route::put('/user_manage/{id}', [UserAccountController::class, 'update']);
            
                //DELETE
                Route::get('/deactivate_user/{id}', [UserAccountController::class, 'deactivateEmployeeUserAccount']);
            });
            
            
            Route::middleware(['auth:sanctum', 'can:admin-access, manager-access'])->group(function () {            
                //CREATE
                Route::post('/product_add', [ProductController::class, 'store']);
                Route::post('/supplier_add', [SupplierController::class, 'store']);
                Route::post('/employee_add', [employeeController::class, 'store']);
                Route::post('/gift_add', [giftcardController::class, 'store']);
                Route::post('/reward_add', [rewardsprogramController::class, 'store']);
            
            
                //READ
                Route::get('/supplier_manage', [SupplierController::class, 'index']);
                Route::get('/employee_manage', [employeeController::class, 'index']);
                Route::get('/reward_manage', [rewardsprogramController::class, 'index']);
                Route::get('/gift_manage', [giftcardController::class, 'index']);
                Route::get('/customer_manage', [UserAccountController::class, 'retrieveAccountInfo']);
            
            
                //UPDATE
                Route::put('/product_manage/{id}', [ProductController::class, 'update']);
                Route::put('/employee_manage/{id}', [employeeController::class, 'update']);
                Route::put('/reward_manage/{id}', [rewardsprogramController::class, 'update']);
                Route::put('/gift_manage/{id}', [giftcardController::class, 'update']);
                Route::put('/supplier_manage/{id}', [SupplierController::class, 'update']);
            
                Route::get('/product_edit/{id}', [ProductController::class, 'edit']);
                Route::get('/employee_edit/{id}', [employeeController::class, 'edit']);
                Route::get('/reward_edit/{id}', [rewardsprogramController::class, 'edit']);
                Route::get('/gift_edit/{id}', [giftcardController::class, 'edit']);
                Route::get('/supplier_edit/{id}', [SupplierController::class, 'edit']);
            
            
                //DELETE
                Route::get('/deactivate_product/{id}', [ProductController::class, 'deactivateProduct']);
                Route::get('/deactivate_reward/{id}', [rewardsprogranController::class, 'deactivateReward']);
                Route::get('/deactivate_giftcard/{id}', [giftcardController::class, 'deactivateGiftCard']);
                Route::get('/deactivate_supplier/{id}', [SupplierController::class, 'deactivateSupplier']);
                Route::get('/deactivate_employee/{id}', [employeeController::class, 'deactivateEmployee']);
            });
            
            
            Route::middleware(['auth:sanctum', 'can:admin-access, manager-access, inventory-access'])->group(function () {            
                //READ
                Route::get('/product_manage', [ProductController::class, 'index']);
            });
            
            
            
            Route::middleware(['auth:sanctum', 'can:customer-access'])->group(function () {       
                Route::post('/checkout', [ProductController::class, 'checkout']);
                Route::get('/purchase_history', [PurchaseHistoryController::class, 'index']);
            });

            
});



