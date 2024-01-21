<?php

use App\Models\Category;
use App\Models\Client;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Type;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

    Route::get('/', function () {
        $locale = App::getLocale();

        if (App::isLocale($locale)) {
            App::setLocale($locale);
        }
        $data['title'] = "Home";
        $posts = Post::take(5)->get();
        $post_collect = collect($posts);
        $post_sort = $post_collect->sortByDesc('id');
        $data['posts'] = $post_sort;

        $clients =  Client::orderBy('id', 'desc')->paginate(6);
        //$collection = collect($client);
        // $sorted = $collection->sortByDesc('id');
        $data['clients'] = $clients;
        $data['coverText'] = Page::find(22);
        $data['boxOne'] = Page::find(24);
        $data['boxTwo'] = Page::find(25);
        $data['boxThree'] = Page::find(27);
        $data['joinClients'] = Page::find(29);
        $testimonials = Testimonial::take(4)->get();
        $testi_collections = collect($testimonials);
        $testi_sorted = $testi_collections->sortByDesc('id');
        $data['testimonials']  = $testi_sorted;
        return view('site.index')->with($data);
    });

    Route::post('/contact_validate', [\App\Http\Controllers\ValidateController::class, 'contact_validate'])
        ->name('contact_validate');

    Route::post('/comment_validate', [\App\Http\Controllers\ValidateController::class, 'comment_validate'])
        ->name('comment_validate');
//		Route::post('/contact_validate', function (Request $request){
//			$this->validate($request, [
//				'name' => 'required|max:255',
//				'email' => 'required|max:255',
//				'message' => 'required',
//			]);
//			$data['title'] = Page::find(39)->byLocale()->title;
//			return view('site.contact')->with($data);
//		});

    Route::get('contact', function () {
        $data['title'] = 'contact';
        $data['notification_user'] = 'normal';
        return view('site.contact')->with($data);
    })->name('contact');

    Route::get('company/about', function () {
        $data['title'] = 'about';
        $data['why'] = Page::find(16);
        $data['profile'] = Page::find(14);
        $data['story'] = Page::find(16);
        return view('site.company')->with($data);
    });

    Route::get('company/partners', function () {
        $data['title'] = 'partners';
        $data['partners'] = Partner::all();
        return view('site.partners')->with($data);
    });

    Route::get('company/our-process', function () {
        $data['title'] = Page::find(19)->byLocale()->title;
        $data['content'] = Page::find(19);
        return view('site.process')->with($data);
    });

    Route::get('company/our-team', function () {
        $data['title'] = 'our_team';
        $data['members'] = Team::all();
        $data['content'] = Page::find(18);
        return view('site.team')->with($data);
    });

    Route::get('company/our-experience', function () {
        $data['title'] = Page::find(15)->title;
        $data['success'] = Page::find(15);
        return view('site.experience')->with($data);
    });

    Route::get('company/location', function () {
        $data['title'] = 'location';
        $data['content'] = Page::find(20);
        return view('site.location')->with($data);
    });

    Route::get('technologies', function () {
        $data['title'] = Page::find(17)->byLocale()->title;
        $data['content'] = Page::find(17);
        return view('site.technologies')->with($data);
    });

    Route::get('services/{slug}', function ($slug) {

        $data['type'] = Type::where('slug', '=', $slug)->first();
        $data['services'] = $data['type']->services->all();
        $data['title'] =  Type::where('slug', '=', $slug)->first()->byLocale()->title;
        return view('site.services')->with($data);
    });

    Route::get('service/{slug}', function ($slug) {
        $data['service'] = Service::where('slug', '=', $slug)->first();
        $data['title'] = Service::where('slug', '=', $slug)->first()->byLocale()->title;
        return view('site.service')->with($data);
    });

    Route::get('clients', function () {
        $data['title'] = 'Clients';
        $data['clients']  = Client::orderBy('id', 'desc')->paginate(100);
        return view('site.clients')->with($data);
    });

    Route::get('client/{slug}', function ($slug) {
        $data['title'] = Client::where('slug', '=', $slug)->first()->name. ' - Client';
        $data['client'] = Client::where('slug', '=', $slug)->first();
        return view('site.client')->with($data);
    });

    Route::get('partner/{slug}', function ($slug) {
        $data['title'] = Page::find(38)->byLocale()->title;
        $data['partner'] = Partner::where('slug', '=', $slug)->first();
        return view('site.partner')->with($data);
    });

    Route::get('blog', function () {
        $data['titles'] = Page::find(37)->byLocale()->title;
        $data['posts'] = Post::orderBy('id', 'desc')->paginate(6);
        $data['title'] = 'blog';

        return view('site.blog')->with($data);
    });

    Route::get('blog/category/{slug}', function ($slug) {
        $data['title'] = Page::find(37)->byLocale()->title;
        $data['titles'] = Page::find(37)->byLocale()->title;
        $data['category'] = Category::where('slug', '=', $slug)->first();
        $data['posts'] = $data['category']->posts()->orderBy('id', 'desc')->paginate(8);
        return view('site.blog')->with($data);
    });

    Route::get('post/{slug}', function ($slug) {
        $data['post'] = Post::where('slug', '=', $slug)->first();
        $data['title'] = Post::where('slug', '=', $slug)->first()->byLocale()->title;

        return view('site.post')->with($data);
    });
});

Route::get('lang/{l}', function ($l) {
    \App::setLocale($l);
    // return \App::getLocale();
    return redirect()->back();
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

Route::get('/home', function () {
    return redirect()->to('admin/welcome');
})->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.welcome');
    });
    Route::get('welcome', function () {
        $data['title'] = "Welcome";
        return view('lite.welcome')->with($data);
    })->name('admin.welcome');

    Route::get('tables', function () {
        $data['title'] = "Tables";
        return view('lite.tables')->with($data);
    });
    Route::resource('pages', \App\Http\Controllers\Lite\PageController::class);
    Route::resource('categories', \App\Http\Controllers\Lite\CategoryController::class);
    Route::resource('types', \App\Http\Controllers\Lite\TypeController::class);
    Route::resource('clients', \App\Http\Controllers\Lite\ClientController::class);
    Route::resource('partners', \App\Http\Controllers\Lite\PartnerController::class);
    Route::resource('posts', \App\Http\Controllers\Lite\PostController::class);
    Route::resource('services', \App\Http\Controllers\Lite\ServiceController::class);
    Route::resource('teams', \App\Http\Controllers\Lite\TeamController::class);
    Route::resource('testimonials', \App\Http\Controllers\Lite\TestimonialController::class);
    Route::resource('socials', \App\Http\Controllers\Lite\SocialController::class);
});

Route::get('/test', function (){
    $target = '/home/afrov/avn_website/public/images';
    $link = '/home/afrov/public_html/images';

    return symlink($target,$link);
});


Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
