<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CampaignUploadController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HarvestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

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
    return redirect('index');
})->name('home');


$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});
//Admin tools view routes

// Route::get('dev', [DevController::class, 'test'])->name('admintools.category');
Route::middleware('auth')->group(function () {

    //Admin Routes
    // Route::group(["middleware" => "roleChecker:admin"], function () {
        Route::prefix('admintools')->group(function () {

            Route::get('user', [PagesController::class, 'manageUser'])->name('admintools.user');
            Route::get('userRole', [PagesController::class, 'manageUserRole'])->name('admintools.userRole');
            Route::get('product', [PagesController::class, 'manageProduct'])->name('admintools.product');
            Route::get('building', [PagesController::class, 'manageBuilding'])->name('admintools.building');
            
            Route::get('group', [PagesController::class, 'manageGroup'])->name('admintools.group');
            Route::get('category', [PagesController::class, 'manageCategory'])->name('admintools.category');
            Route::get('product', [PagesController::class, 'manageProduct'])->name('admintools.product');
            Route::get('phoneBrand', [PagesController::class, 'managePhoneBrand'])->name('admintools.phoneBrand');
           
        });

        //Manage Building Routes
        Route::post('buildingDataTable', [BuildingController::class, 'listBuildings'])->name('building.list');
        Route::post('buildingAdd', [BuildingController::class, 'addBuilding'])->name('building.add');
        Route::post('buildingEdit', [BuildingController::class, 'editBuilding'])->name('building.edit');
        Route::post('buildingGetEdit', [BuildingController::class, 'getEditBuilding'])->name('building.getEdit');
        Route::post('buildingDelete', [BuildingController::class, 'deleteBuilding'])->name('building.delete');

        //Manage Product Routes
        Route::post('productDataTable', [ProductController::class, 'listProducts'])->name('product.list');
        Route::post('productAdd', [ProductController::class, 'addProduct'])->name('product.add');
        Route::post('productEdit', [ProductController::class, 'editProduct'])->name('product.edit');
        Route::post('productGetEdit', [ProductController::class, 'getEditProduct'])->name('product.getEdit');
        Route::post('productDelete', [ProductController::class, 'deleteProduct'])->name('product.delete');

        //Manage User Routes
        Route::post('userDataTable', [UserController::class, 'listUsers'])->name('user.list');
        Route::post('userAdd', [UserController::class, 'addUser'])->name('user.add');
        Route::post('userEdit', [UserController::class, 'editUser'])->name('user.edit');
        Route::post('userGetEdit', [UserController::class, 'getEditUser'])->name('user.getEdit');
        Route::post('userDelete', [UserController::class, 'deleteUser'])->name('user.delete');

        //Manage User Role Routes
        Route::post('userRoleDataTable', [UserRoleController::class, 'listUserRoles'])->name('userRole.list');
        Route::post('userRoleAdd', [UserRoleController::class, 'addUserRole'])->name('userRole.add');
        Route::post('userRoleEdit', [UserRoleController::class, 'editUserRole'])->name('userRole.edit');
        Route::post('userRoleGetEdit', [UserRoleController::class, 'getEditUserRole'])->name('userRole.getEdit');
        Route::post('userRoleDelete', [UserRoleController::class, 'deleteUserRole'])->name('userRole.delete');

        //Audit Routes
        Route::post('auditLogDataTable', [AuditLogController::class, 'listAuditLog'])->name('auditLog.list');
        Route::post('auditLogDelete', [AuditLogController::class, 'deleteAuditLog'])->name('auditLog.delete');

        //Campaign Upload Routes
        Route::post('upload', [CampaignUploadController::class, 'mainFunction'])->name('campaignUpload.main');
        Route::post('campaignUploadDataTable', [CampaignUploadController::class, 'listCampaignUpload'])->name('campaignUpload.list');
        Route::post('campaignUploadDelete', [CampaignUploadController::class, 'deleteCampaignUpload'])->name('campaignUpload.delete');

        //chart routes
        Route::post('outputPerMonth', [BatchController::class, 'monthlyEggProduce'])->name('chart.quantity.month');
        Route::post('outputPerYear', [BatchController::class, 'yearlyEggProduce'])->name('chart.quantity.yearly');

        Route::post('buildingHarvestContribution', [BatchController::class, 'buildingHarvestContribution'])->name('chart.harvest.Contribution');
        Route::post('buildingStockContribution', [BatchController::class, 'buildingStockContribution'])->name('chart.stock.Contribution');
        
        Route::post('productByBuilding', [BatchController::class, 'productByBuilding'])->name('chart.harvest');
        Route::post('stockPerBuilding', [BatchController::class, 'stockByBuilding'])->name('chart.stock');

     

    
        //Lists Page Routes
        Route::prefix('list')->group(function () {

            Route::get('harvest', [PagesController::class, 'manageHarvest'])->name('list.harvest');
            Route::get('batch', [PagesController::class, 'manageBatch'])->name('list.batch');

            Route::get('receipt', [PagesController::class, 'manageReceipt'])->name('list.receipt');
            Route::get('order', [PagesController::class, 'manageOrder'])->name('list.order');

            Route::post('harvestDataTable', [HarvestController::class, 'listHarvest'])->name('harvest.list');
            Route::post('harvestDelete', [HarvestController::class, 'deleteHarvest'])->name('harvest.delete');

            Route::post('batchDataTable', [BatchController::class, 'listBatch'])->name('batch.list');
            Route::post('batchEdit', [BatchController::class, 'editBatch'])->name('batch.edit');
            Route::post('batchGetEdit', [BatchController::class, 'getEditBatch'])->name('batch.getEdit');
            Route::post('batchDelete', [BatchController::class, 'deleteBatch'])->name('batch.delete');
            Route::get('generate', [BatchController::class, 'generateQrCode'])->name('generate.qr');

            Route::post('receiptDataTable', [ReceiptController::class, 'listReceipt'])->name('receipt.list');
            Route::post('orderDataTable', [OrderController::class, 'listOrder'])->name('order.list');

            Route::get('admin', [PagesController::class, 'adminReport'])->name('report.admin');
            Route::post('generateReport', [AdminReportController::class, 'generateReport'])->name('report.generate');
            Route::get('export', [AdminReportController::class, 'export']);
        });

        //Misc Page Routes
        Route::prefix('misc')->group(function () {
            Route::get('uploadCSV', [PagesController::class, 'uploadCSV'])->name('misc.upload');
            Route::get('downloadSample', [BatchController::class, 'downloadSampleFile'])->name('download.sample');
            Route::get('auditLog', [PagesController::class, 'showAuditLog'])->name('misc.auditLog');
            Route::get('generateQRCode', [PagesController::class, 'generateQRCode'])->name('misc.qrCode');
            Route::get('campaignUpload', [PagesController::class, 'showCampaignUpload'])->name('misc.campaignUpload');

            Route::post('upload', [BatchController::class, 'upload']);
        });
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });



    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });
});


/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__ . '/auth.php';
