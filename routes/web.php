<?php
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\TierController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SendmailController;
use App\Http\Controllers\TagsController;
use GuzzleHttp\Middleware;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;
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

// php info

// Route::get('phpmyinfo', function () {
//     phpinfo(); 
// })->name('phpmyinfo');


Route::get('/template', [SendmailController::class, 'template']);




// ---------------------------------|| Sitemap Route || ------------------------------//

Route::get('sitemap',function(){
    $site = App::make('sitemap');
    $site->add(URL::to('/'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/blog'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/topik'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/contact'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/about'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/daftar-author'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/privacy-policy'),date("Y-m-d h:i:s"),1,'daily');
    $site->add(URL::to('/terms'),date("Y-m-d h:i:s"),1,'daily');
    $posts = Post::all();
    foreach ($posts as $key => $post) {
        $site->add(URL::to('/blog/'. $post->slug),$post->created_at,1,'daily');

    }
    foreach ($posts as $key => $post) {
        // searching navbar post
        $site->add(URL::to('/blog?search='. $post->slug),$post->created_at,1,'daily');
    }
    $categories = Category::all();
    foreach ($categories as $key => $category) {
        // searching navbar category
        $site->add(URL::to('/blog?category='. $category->slug),$category->created_at,1,'daily');
    }
    $tags = Tag::all();
    foreach ($tags as $key => $tag) {
        // searching navbar tag
        $site->add(URL::to('/blog?tag='. $tag->slug),$tag->created_at,1,'daily');
    }
    // store to xml
    $site->store('xml','sitemap');
});

// --------------------------------|| end Sitemap || ----------------------------------//

// ---------------------------|| file manager ||---------------------------------------//

// ---------------------------------filemanage laravel------------------------------------
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});

// ---------------------------end file manager---------------------------------------//



// --------------------------|| Navbar Frontend route ||-------------------------------//

// -------------------------------Subscriber footer CREATE-------------------------------
Route::post('/', [SubscriberController::class, 'store'])->name('subscriberfooter');
Route::post('/blog', [SubscriberController::class, 'storepost'])->name('subscriberpost');
// --------------------------------------end subs------------------------------------------

// -----------------------categories-------------------------
Route::get('/topik', [PostController::class, 'category']);

// -----------------------end categories---------------------


// -----------------------home---------------------------
Route::get('/', [HomeController::class, 'index']);

// -----------------------end home-----------------------


// ----------------------donasi---------------------------
Route::get('/donasi', function () {
    return view('donasi', [
        "title" => "Donasi"
       
    ]);
});
// ----------------------end donasi------------------------


// ----------------------daftar author----------------------
Route::get('/daftar-author', function () {
    return view('daftarauthor', [
        "title" => "Pendaftaran Author"
       
    ]);
});
// ----------------------end daftar author------------------


// -------------------about----------------------------
Route::get('/about',[AboutController::class,'index']);

// ------------------end about-------------------------


// -----------------------Kontak---------------------------
Route::get('contact', [ContactController::class,'index']);
Route::post('contact', [ContactController::class, 'store']);

// -------------------------end kontak---------------------


// ------------------------privacy Policy-------------------------------
Route::get('/privacy-policy', function () {
    return view('privacy', [
        "title" => "Privasi"
    ]);
});

// ---------------------end privacy Policy------------------------------


//------------------------terms-----------------------------
Route::get('/terms', function () {
    return view('terms', [
        "title" => "Ketentuan"
    ]);
});

// ------------------------end terms------------------------


// -----------------------blog-------------------------------
Route::get('/blog', [PostController::class, 'index']);

// -----------------------end blog---------------------------


// -----------------------halaman single post----------------------
Route::get('blog/{post:slug}', [PostController::class, 'show']);

// --------------------------end single post-----------------------

// ------------------------halaman portfolio-------------------------
Route::resource('/portfolio', PortfolioController::class);

// --------------------------|| end Navbar Frontend route ||-------------------------------//



// ------------------------------------------------|| Dashboard route ||------------------------------------------------------//

// -----------------------------------------------Kirim Email----------------------------------------------------
Route::get('/dashboard/balas-pesan', [SendmailController::class,'index'])->middleware('auth','admin');
Route::post('/dashboard/balas-pesan', [SendmailController::class,'sendemail'])->name('send.email')->middleware('auth','admin');

// -----------------------------------------------end Kirim Email----------------------------------------------------

// -----------------------------------------------Manajemen user---------------------------------------------------
Route::resource('/dashboard/manajemen-user', UserController::class)->except('show')->middleware(['auth','admin']);

// -----------------------------------------------end Manajemen user------------------------------------------------



// -----------------------------------------------subcscriber-----------------------------------------------------------
Route::resource('/dashboard/subscriber', SubscriberController::class,)->except('show')->middleware('auth','admin');

Route::get('/dashboard/exportsubscriber', [SubscriberController::class,'subscriberexport'])->name('export.subscriber');
// ------------------------------------------------end subscriber-------------------------------------------------------

// -------------------------------tier-----------------------------
// Route::get('/dashboard/tier-user', [TierController::class,'index'])->middleware('auth');
// Route::get('/dashboard/tier-user', [TierController::class,'count'])->middleware('auth');
// ---------------docs--------------------
Route::get('/dashboard/docs', function () {
    return view('dashboard.docs', [
        "title" => "Documentation TheDevcode"
       
    ]);
})->middleware('auth');


// ------------------------------------------------Dashboard Pesan Masuk----------------------------------------------
Route::get('/dashboard/pesanmasuk', [ContactController::class,'show'])->middleware('auth','admin');
Route::delete('/dashboard/pesanmasuk/{contact:id}',[ContactController::class,'destroy'] )->middleware('auth','admin');
Route::put('/dashboard/pesanmasuk/isread/{contact:id}', [ContactController::class,'update'])->middleware('auth','admin');
// -------------------------------------------------------end---------------------------------------------------------

// auto input slug
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
// Tag resource route
Route::resource('/dashboard/tags', TagsController::class,)->except('show','update','edit','create')->middleware(['auth']);;
// admin categories resource route
Route::resource('/dashboard/categories', AdminCategoryController::class,)->except('show','update','edit')->middleware(['auth','admin']);;
// resource route mypost
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware(['auth'])->except('show');
// update post published
Route::put('/dashboard/posts/publish/{post:id}' ,[DashboardPostController::class,'updatepublished'])->middleware('admin')->name('updatepublished');


//  profile update
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard/profile', [ProfileController::class,'index']);
    Route::post('/dashboard/profile', [ProfileController::class,'update'])->name('profile.update');
   
});

//  dashboard
Route::get('/dashboard', [DashboardPostController::class, 'count'])->middleware('auth');
// ubah profile image
Route::post('/change-picture', [ProfileController::class,'updateAvatar'])->name('change.picture')->middleware('auth');

// ubah password from dashboard
Route::post('/change-password', [ChangePasswordController::class,'store'])->name('change.password')->middleware('auth');

Route::get('/dashboard/changepassword', [ChangePasswordController::class ,'index'])->middleware('auth');
// _______________________________//



require __DIR__.'/auth.php';
