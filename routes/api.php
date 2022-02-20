<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [\App\Http\Controllers\APIAuth\Login::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::get('/logout', [\App\Http\Controllers\APIAuth\Logout::class, 'logout']);
    Route::get('/departments_list', [\App\Http\Controllers\Clients\Departments\API\DepartmentsList::class, 'index']);
    Route::apiResource('jobs', \App\Http\Controllers\Clients\Jobs\JobsResource::class);


    Route::post('work_in_progress_filter',[App\Http\Controllers\FilterController::class,'workInProgress']);
    Route::post('finished_filter',[App\Http\Controllers\FilterController::class,'finishedJobs']);
    Route::post('invoiced_filter',[App\Http\Controllers\FilterController::class,'invoicedJobs']);
    Route::post('collected_filter',[App\Http\Controllers\FilterController::class,'collectedJobs']);
//    DATATABLES
});



Route::post('all_jobs_filter',[App\Http\Controllers\FilterController::class,'allJobs']);

Route::get('jobs_list', [App\Http\Controllers\Clients\Jobs\DataTables\Jobs::class, 'index']);
Route::get('work_in_progress', [App\Http\Controllers\Clients\Jobs\DataTables\Jobs::class, 'wip']);
Route::get('finished', [App\Http\Controllers\Clients\Jobs\DataTables\Jobs::class, 'finished']);
Route::get('invoiced', [App\Http\Controllers\Clients\Jobs\DataTables\Jobs::class, 'invoiced']);
Route::get('collected', [App\Http\Controllers\Clients\Jobs\DataTables\Jobs::class, 'collected']);
