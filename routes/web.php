<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\master;
use App\Http\Controllers\Login;
use App\Http\Controllers\formBuilderController;
use App\Http\Controllers\CandidateCont;
use App\Http\Controllers\HiringCont;

Route::get('/', [Login::class,'login']);
Route::post('/login', [Login::class,'prsLogin']);

Route::get('/dashboard', [master::class, 'dashboard']);
Route::get('/jobs', [master::class, 'jobs']);
Route::get('/jobs/detail/{id}', [master::class, 'detailJobs']);
Route::get('/jobs/edit/{id}', [master::class, 'editJobs']);
Route::get('/jobs/success', [master::class, 'JobsSc'])->name('jobs.success');
Route::get('/jobs/add', [master::class, 'addJobs']);
Route::post('/jobs/add', [master::class, 'prsAddJobs']);
Route::post('/jobs/edit', [master::class, 'prsEditJob']);
Route::get('/jobs/activity/{id}', [master::class, 'activity']);
Route::get('/jobs/setting/{id}', [master::class, 'jobsetting']);
Route::post('/update-candidate-jobs', [master::class, 'updateJobs'])->name('updateCandidateJobs');
Route::post('/jobs/setting', [master::class, 'addpic']);
Route::post('/update-status', [master::class, 'updateStatus'])->name('update.status');
Route::post('jobs/duplicate', [master::class, 'duplicateJob']);
Route::post('/jobs/delete', [master::class, 'deleteJob']);
Route::post('/jobs/addStatus', [master::class, 'addStatus']);


Route::get('/candidate', [CandidateCont::class, 'candidate']);


Route::get('/hiring', [HiringCont::class, 'hiring']);



