<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\master;
use App\Http\Controllers\Login;
use App\Http\Controllers\formBuilderController;
use App\Http\Controllers\CandidateCont;
use App\Http\Controllers\HiringCont;
use App\Http\Controllers\CancelCont;
use App\Http\Controllers\ReportCont;
use App\Http\Controllers\StopJoCont;
use App\Http\Controllers\TerminatedCont;

Route::get('/', [Login::class,'login'])->name('login');
Route::post('/login', [Login::class,'prsLogin']);
Route::group([
    'middleware' => 'auth',
], function(){
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
    Route::post('/jobs/notif', [master::class, 'notif']);
    Route::get('/jobs/cari',[master::class, 'cari']);
    
    Route::get('/candidates', [CandidateCont::class, 'candidate'])->name('candidates');
    Route::get('/candidates/detail', [CandidateCont::class, 'candidateDetailView'])->name('candidates');
    Route::get('/candidates/detail/{id}', [CandidateCont::class, 'candidateDetailViewId'])->name('candidates');
    Route::post('/candidates/detail/notes', [CandidateCont::class, 'notesAdd'])->name('candidates');
    Route::post('/candidates/detail/notes/add', [CandidateCont::class, 'notesAddResume'])->name('candidates');
    Route::post('/candidates/detail/rating/add', [CandidateCont::class, 'addRating'])->name('candidates');
    Route::post('/candidates/detail/job-experience/add', [CandidateCont::class, 'addJobExp'])->name('candidates');
    Route::post('/candidates/detail/job-experience/edit', [CandidateCont::class, 'editJobExp'])->name('candidates');
    Route::post('/candidates/detail/edu-experience/add', [CandidateCont::class, 'addEduExp'])->name('candidates');
    Route::post('/candidates/detail/edu-experience/edit', [CandidateCont::class, 'editEduExp'])->name('candidates');
    Route::post('/candidates/detail/organization-experience/add', [CandidateCont::class, 'addOrgExp'])->name('candidates');
    Route::post('/candidates/detail/organization-experience/edit', [CandidateCont::class, 'editOrgExp'])->name('candidates');
    Route::post('/candidates/detail/languages/add', [CandidateCont::class, 'addBhsExp'])->name('candidates');
    Route::post('/candidates/detail/languages/edit', [CandidateCont::class, 'editBhsExp'])->name('candidates');
    Route::delete('/candidates/delete', [CandidateCont::class, 'delete']);
    
    Route::get('/hiring', [HiringCont::class, 'hiring'])->name('hiring');
    Route::get('/hiring/report', [HiringCont::class, 'reportHiring'])->name('hiring');
    
    Route::get('/cancel-join', [CancelCont::class, 'cancel_join'])->name('cancel-join');
    Route::get('/cancel-join/create', [CancelCont::class, 'create'])->name('cancel-join');
    
    Route::get('/report-hiring', [ReportCont::class, 'hiringIndex']);
    Route::get('/report-job-order', [ReportCont::class, 'joIndex']);

    
    Route::get('/stop-job-order', [StopJoCont::class, 'index']);
    
    Route::get('/terminated-cj', [TerminatedCont::class, 'cancel_join']);
    Route::get('/terminated-resign', [TerminatedCont::class, 'resign']);
});




