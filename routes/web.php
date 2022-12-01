<?php

use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\InvoiceController;

Route::get('/', [BaseController::class, 'index'])->name('home');
Route::get('/setting', [BaseController::class, 'setting'])->name('setting');
Route::post('/setting-update', [BaseController::class, 'update'])->name('setting.update');


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
