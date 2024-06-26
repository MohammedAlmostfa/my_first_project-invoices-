<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveInvoicesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvocesDetailsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('View_file/{invoice_number}/{file_name}',[InvocesDetailsController::class, 'open_file']);
Route::get('download/{invoice_number}/{file_name}', [InvocesDetailsController::class, 'get_file']);
Route::post('/delete_file', [InvocesDetailsController::class, 'destroy'])->name('delete_file');
Route::resource('/invoices',invoicesController::class);
Route::resource('section', SectionController::class);
Route::resource('product', ProductController::class);
Route::resource('Archive',ArchiveInvoicesController::class);
Route::post('Status_Update/{id}',[InvoicesController::class,'Status_Update']);
Route::get('sectionn/{id}',[InvoicesController::class,'getproducts']);
Route::get('invoicesdetails/{id}', [InvocesDetailsController::class, 'edait'])->name('invoicesdetails');
Route::get('edit_invoice/{id}',[InvoicesController::class,'edait']);
Route::get('Status_show/{id}',[InvoicesController::class,'show']);
Route::get('print_invoices/{id}',[InvoicesController::class,'print']);
Route::get('invoices_paid',[InvoicesController::class,'paid']);
Route::get('invoices_unpaid',[InvoicesController::class,'unpaid']);
Route::get('invoices_partial',[InvoicesController::class,'partial']);



   
Route::group(['middlewareAliases' => ['role:super-admin|admin']], function() {

 Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);


    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

});
Route::get('/{page}', [AdminController::class, 'index']);



