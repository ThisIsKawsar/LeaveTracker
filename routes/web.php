<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::resource('leaves', App\Http\Controllers\LeaveController::class)->middleware('auth');
Route::get('/home',     [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/employee', [App\Http\Controllers\EmployeeManagmentController::class, 'employee'])->middleware('auth');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::resource('leave-requests',    App\Http\Controllers\LeaveRequestController::class);
    Route::resource('employee-manege',   App\Http\Controllers\EmployeeManagmentController::class);



    Route::get('total/employee', [App\Http\Controllers\LeaveRequestController::class, 'totalEmployee'])->name('totalEmployee');
    
 
});


    

   

