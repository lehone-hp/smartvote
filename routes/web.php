<?php

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

    Route::get('/elections', 'ElectionController@index')->name('election.index');
    Route::post('/election/create', 'ElectionController@createElection')->name('election.create');
    Route::get('/elections/{election_id}', 'ElectionController@getSingle')->name('election.single');
    Route::post('/election/candidate/add', 'ElectionController@addCandidate')->name('election.candidate.add');
    Route::post('/elections/candidate/edit/{candidate_id}', 'ElectionController@editCandidate')->name('election.candidate.edit');
    Route::post('/election/candidate/add-vote', 'ElectionController@addCandidateVote')->name('election.candidate.vote');
    Route::post('/election/candidate/reduce-vote', 'ElectionController@reduceCandidateVote')->name('election.candidate.reduce');
    Route::post('/elections/candidate/remove/{candidate_id}', 'ElectionController@removeCandidate')->name('election.candidate.remove');
    Route::get('/election/results/{election_id}', 'ElectionController@viewResults')->name('election.results');

    Route::get('/candidate/photo/{photo}',  'ElectionController@getCandidatePhoto')->name('candidate.photo');
    Route::get('/rest-all-elections',  'ElectionController@resetAllElections');
});

Auth::routes();

