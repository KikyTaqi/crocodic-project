<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\master;
use App\Http\Controllers\Login;
use App\Http\Controllers\formBuilderController;
use App\Http\Controllers\CandidateCont;
use App\Http\Controllers\HiringCont;

Route::get('/', [Login::class,'login']);
Route::post('/login', [Login::class,'prsLogin']);
Route::get('/logout', [Login::class,'logout']);

Route::get('/dashboard', [master::class, 'dashboard'])->name('dashboard');

Route::get('/jobs', [master::class, 'jobs'])->name('jobs');
Route::get('/jobs/detail/{id}', [master::class, 'detailJobs'])->name('jobs');
Route::get('/jobs/edit/{id}', [master::class, 'editJobs'])->name('jobs');
Route::get('/jobs/success', [master::class, 'JobsSc'])->name('jobs.success');
Route::get('/jobs/add', [master::class, 'addJobs'])->name('jobs');
Route::post('/jobs/add', [master::class, 'prsAddJobs']);
Route::post('/jobs/edit', [master::class, 'prsEditJob']);
Route::get('/jobs/activity/{id}', [master::class, 'activity'])->name('jobs');
Route::get('/jobs/setting/{id}', [master::class, 'jobsetting'])->name('jobs');
Route::post('/update-candidate-jobs', [master::class, 'updateJobs'])->name('updateCandidateJobs');
Route::post('/jobs/setting', [master::class, 'addpic']);
Route::post('/update-status', [master::class, 'updateStatus'])->name('update.status');
Route::post('jobs/duplicate', [master::class, 'duplicateJob']);
Route::post('/jobs/delete', [master::class, 'deleteJob']);
Route::post('/jobs/addStatus', [master::class, 'addStatus']);


Route::get('/candidates', [CandidateCont::class, 'candidate'])->name('candidates');
Route::get('/candidates/detail', [CandidateCont::class, 'candidateDetailView'])->name('candidates');
Route::get('/candidates/detail/{id}', [CandidateCont::class, 'candidateDetail'])->name('candidates');
Route::delete('/candidates/delete', [CandidateCont::class, 'delete']);


Route::get('/hiring', [HiringCont::class, 'hiring'])->name('hiring');



