<?php

use App\Http\Controllers\ElectionController;
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
Route::get('/logout', function () {
    Auth::logout();
    return redirect("/");
})->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/elections', [ElectionController::class, 'index'])->name('election.index');
    Route::post('/election/create', [ElectionController::class, 'createElection'])->name('election.create');
    Route::get('/elections/{election_id}', [ElectionController::class, 'getSingle'])->name('election.single');
    Route::post('/election/candidate/add', [ElectionController::class, 'addCandidate'])->name('election.candidate.add');
    Route::post('/elections/candidate/edit/{candidate_id}', [ElectionController::class, 'editCandidate'])->name('election.candidate.edit');
    Route::post('/election/candidate/add-vote', [ElectionController::class, 'addCandidateVote'])->name('election.candidate.vote');
    Route::post('/election/candidate/reduce-vote', [ElectionController::class, 'reduceCandidateVote'])->name('election.candidate.reduce');
    Route::post('/elections/candidate/remove/{candidate_id}', [ElectionController::class, 'removeCandidate'])->name('election.candidate.remove');
    Route::get('/election/results/{election_id}', [ElectionController::class, 'viewResults'])->name('election.results');

    Route::get('/candidate/photo/{photo}',  [ElectionController::class, 'getCandidatePhoto'])->name('candidate.photo');
    Route::get('/rest-all-elections',  [ElectionController::class, 'resetAllElections']);
});

Auth::routes();
