<?php


use Intervention\Image\Facades\Image;

Route::get('test', function () {
    $height = 400;
    $width = 600;

    $img = Image::make(public_path('img/long.png'))->heighten($height);
    $canvas = Image::canvas($width, $height, 'rgb(255,255,255)');

    // if image is tall image
    if ($img->width() > $width) {
        $img = $img->widen($width);
    }

    $canvas->insert($img, 'center');


    return $canvas->response('png');

});









Route::get('email-test', function(){

    $details['email'] = 'lehone4hope@gmail.com';

    dispatch(new App\Jobs\SendEmailJob($details, new \App\Mail\SendEmail()));
    dd('done');
});


Route::get('/try', 'HomeController@try')->name('try');
Route::get('/delete-email', 'HomeController@deleteEmailAlerts');
Route::post('/delete-email', 'HomeController@deleteAlert')->name('delete_alerts');

Route::get('/paypal', 'HomeController@paypalForm')->name('paywithpaypal');
Route::Post('/paypal', 'HomeController@payWithpaypal')->name('paywithpaypal');
Route::get('/paypal/status', 'HomeController@getPaymentStatus')->name('paywithpaypal.status');

Route::get('/qr_code', function () {
    $image = QrCode::format('png')->encoding('UTF-16BE')
        ->margin(2)->size(300)->generate('Make me into an QrCode!');

    $image = base64_encode($image);

    return view('qr_code', compact('image'));
});

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
Route::post('/upload',  'HomeController@uploadChunks')->name('upload.dropzone');
Route::post('/upload/concat',  'HomeController@concatChunks')->name('concat.dropzone');
Route::post('/upload/jwplayer',  'HomeController@uploadToJW')->name('jw.upload');

