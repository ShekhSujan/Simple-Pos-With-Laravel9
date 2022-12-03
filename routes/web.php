<?php

use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicineController;

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/setting', [BaseController::class, 'setting'])->name('setting');
Route::post('/setting-update', [BaseController::class, 'update'])->name('setting.update');

//Customer Routes
Route::get("/customer", [CustomerController::class, 'index'])->name("customer.index");
Route::get("/customer/create", [CustomerController::class, 'create'])->name("customer.create");
Route::post("/customer", [CustomerController::class, 'store'])->name("customer.store");
Route::get("/customer/edit/{id}", [CustomerController::class, 'edit'])->name("customer.edit");
Route::post("/customer/update", [CustomerController::class, 'update'])->name("customer.update");
Route::get("/customer/trash-list", [CustomerController::class, 'trash_list'])->name("customer.trash_list");
Route::post("/customer/trash", [CustomerController::class, 'trash'])->name("customer.trash");
Route::post("/customer/bulk-action", [CustomerController::class, 'bulk_action'])->name("customer.bulk_action");

//Medicine Routes
Route::get("/medicine", [MedicineController::class, 'index'])->name("medicine.index");
Route::get("/medicine/create", [MedicineController::class, 'create'])->name("medicine.create");
Route::post("/medicine", [MedicineController::class, 'store'])->name("medicine.store");
Route::get("/medicine/edit/{id}", [MedicineController::class, 'edit'])->name("medicine.edit");
Route::post("/medicine/update", [MedicineController::class, 'update'])->name("medicine.update");
Route::get("/medicine/trash-list", [MedicineController::class, 'trash_list'])->name("medicine.trash_list");
Route::post("/medicine/trash", [MedicineController::class, 'trash'])->name("medicine.trash");
Route::post("/medicine/bulk-action", [MedicineController::class, 'bulk_action'])->name("medicine.bulk_action");

//Stock Routes
Route::get("/stock", [StockController::class, 'index'])->name("stock.index");
Route::post("/stock/update", [StockController::class, 'update'])->name("stock.update");
Route::get("/stock/view/{id}", [StockController::class, 'view'])->name("stock.view");

//Order Routes
Route::get("/order", [OrderController::class, 'index'])->name("order.index");
Route::get("/order/create", [OrderController::class, 'create'])->name("order.create");
Route::post("/order", [OrderController::class, 'store'])->name("order.store");



View::composer(['components.leftbar', 'components.meta'], function ($views) {
    $allSetting = Setting::first();
    $views->with('allSetting', $allSetting);
});

Route::get('/clear-log', function () {
    try {
        Artisan::call('log:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Toastr::success('Log Cleared Successfully', 'Success');
        return redirect()->back();
    } catch (\Throwable $th) {
        Toastr::error('Some Error Occcurs', 'Danger');
        return redirect()->back();
    }
})->name('clear_log');
