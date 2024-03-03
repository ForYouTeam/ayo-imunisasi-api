<?php

use App\Http\Controllers\BackOffice\ChildrenController;
use App\Http\Controllers\BackOffice\MemberSettingController;
use App\Http\Controllers\BackOffice\MideWifeController;
use App\Http\Controllers\BackOffice\ParentController;
use App\Http\Controllers\BackOffice\ResultNoteController;
use App\Http\Controllers\BackOffice\ScheduleController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\BackOffice\VisitHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/users')->controller(UserController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/midwifes')->controller(MideWifeController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/parents')->controller(ParentController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/childrens')->controller(ChildrenController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/visit-historys')->controller(VisitHistoryController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/member-settings')->controller(MemberSettingController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/schedules')->controller(ScheduleController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
Route::prefix('v1/result-notes')->controller(ResultNoteController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});
