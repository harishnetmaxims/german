<?php

use App\bread_images;
use App\Http\Controllers\AddImageController;
use App\Http\Controllers\AddVideoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BlogCatController;
use App\Http\Controllers\BreadImagesController;
use App\Http\Controllers\image;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PdEnteryController;
use App\Http\Controllers\Webpanelcontroller;
use App\Http\Controllers\UpdateSocialProfileController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminBlogCatController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\KoerController;
use App\Http\Controllers\RegistryController;
use App\Http\Controllers\HipsController;
use App\Http\Controllers\ElbowController;
use App\Http\Controllers\BreederController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PedigreeController;

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


Route::get('/edit-image/{indexer}', [AddImageController::class,'edit_image']);
Route::get('/edit-video/{indexer}', [AddVideoController::class,'edit_video']);
Route::post('/store_images/{indexer}', [AddImageController::class,'update']);
Route::post('/store-video/{id}', [AddVideoController::class,'update']);



Route::get('/', [Pagecontroller::class,'home']);
Route::post('newsletter',[Pagecontroller::class,'newsletter']);
Route::post('ajax',[Pagecontroller::class,'ajax']);
//Route::get('/', [BreadImagesController::class,'show']);
Route::get('/login', [LoginController::class,'index']);
Route::get('/signup', [LoginController::class,'register']);
Route::get('/userdetail', [LoginController::class,'userdetail']);
Route::get('/manage-pedigree', [PdEnteryController::class,'manage_pedigree']);
Route::get('/manage-images', [AddImageController::class,'manage_images']);
Route::get('/manage-blogs', [LoginController::class,'manage_blogs']);
Route::get('/manage-videos', [AddVideoController::class,'manage_videos']);
Route::get('/addpedigree', [PdEnteryController::class,'addpedigree']);
Route::post('/create_pedigree', [PdEnteryController::class,'create_pedigree'])->name('create_pedigree');
Route::get('/uploadimg', [AlbumController::class,'uploadimg']);
Route::get('/addvideo', [LoginController::class,'addvideo']);
Route::post('/create_album', [AlbumController::class,'create'])->name('create_album');
Route::post('/add_images', [AddImageController::class,'add_images'])->name('add_images');
Route::post('/add_video', [AddVideoController::class,'add_video'])->name('add_video');
Route::Post('login/auth', [LoginController::class,'auth'])->name('login.auth');
Route::Post('signup/create', [LoginController::class,'create'])->name('signup.create');
Route::get('/about', [Pagecontroller::class,'about']);
Route::get('/advertise', [Pagecontroller::class,'advertise']);
Route::get('/blog', [BlogCatController::class,'show']);
Route::get('/contact', [Pagecontroller::class,'contact']);
Route::get('/faq', [Pagecontroller::class,'faq']);
Route::get('/privacy-policy', [Pagecontroller::class,'privacy_policy']);
Route::get('/site-news', [Pagecontroller::class,'site_news']);
Route::get('/terms-of-use', [Pagecontroller::class,'terms_of_use']);
Route::get('/copyright-info', [Pagecontroller::class,'copyright_info']);
// Route::get('logout',function(){
//     session()->forget('LOGIN_SUC',true);
//     session()->forget('id');
//     //session()->flash('msg','Logined successfully');
//     return redirect('');
// });
Route::get('logout',function(){
    session()->forget('LOGIN_SUC',true);
    session()->forget('name');
    session()->forget('user_id');
    session()->forget('sees_breeder');
    session()->forget('sees_owner');
    //session()->flash('msg','Logined successfully');
    return redirect('');
});
Route::get('/gallery', [Pagecontroller::class,'gallery']);
Route::get('/galdetail/{id}/{imgid?}',[Pagecontroller::class,'galdetail']);
Route::get('/pedigree', [Pagecontroller::class,'pedigree']);
Route::get('/breeders', [Pagecontroller::class,'breeders']);
Route::get('/people', [Pagecontroller::class,'people']);
Route::get('/video-gallery', [Pagecontroller::class,'video_gallery']);
Route::get('/video-subgallery/{id}', [Pagecontroller::class,'video_subgallery']);
Route::get('/videopage/{channel_id}/{sub_channel_id}', [Pagecontroller::class,'videopage']);
Route::get('/memberdetail/{id}', [Pagecontroller::class, 'memberdetail']);
Route::get('/membervideo/{id}', [Pagecontroller::class, 'membervideo']);
Route::get('/playvideo/{vid}', [Pagecontroller::class, 'playvideo']);
Route::get('/pdgdetail/{pdgid}/{pdgcat}', [Pagecontroller::class, 'pdgdetail']);
Route::post('search',[Pagecontroller::class,'search']);
Route::post('vid-comment',[Pagecontroller::class,'vid_comment'])->name('vid-comment');
Route::get('update-profile',[Pagecontroller::class,'update_profile']);
Route::post('update-user-profile',[Pagecontroller::class,'update_user_profile'])->name('update-user-profile');

Route::get('addowner',[OwnersController::class,'addowner'])->middleware('loginCheck');;
Route::post('addowner',[OwnersController::class,'front_store'])->name('addowner')->middleware('loginCheck');;
Route::get('manage-owner',[OwnersController::class,'manageowner'])->middleware('loginCheck');;
Route::get('editowner/{id}',[OwnersController::class,'editowner'])->middleware('loginCheck');;
Route::post('editowner/{id}',[OwnersController::class,'fornt_update'])->name('editowner')->middleware('loginCheck');;


Route::get('addbreeder',[BreederController::class,'addbreeder']);
Route::post('addbreeder',[BreederController::class,'front_store'])->name('addbreeder');
Route::get('manage-breeder',[BreederController::class,'managebreeder'])->middleware('loginCheck');;
Route::get('editbreeder/{id}',[BreederController::class,'editbreeder'])->middleware('loginCheck');;
Route::post('editbreeder/{id}',[BreederController::class,'fornt_update'])->name('editbreeder')->middleware('loginCheck');;


Route::get('test',[Pagecontroller::class,'test']);
Route::post('test',[Pagecontroller::class,'store'])->name('test');

Route::post('search_p',[Pagecontroller::class,'search_header']);
 
Route::get('/webadmin', [Webpanelcontroller::class, 'show'])->middleware('alreadyLogin');
Route::Post('webadmin/auth', [Webpanelcontroller::class,'auth'])->name('webadmin.auth')->middleware('alreadyLogin');
Route::get('adminlogout', function () {
	session()->pull('LOGIN_SUC');
	return redirect('webadmin')->with('msg','You have logged out successfully..!');
});
Route::get('/webadmin/home', [Webpanelcontroller::class, 'home'])->middleware('loginCheck');

/*------------------ Manage Logo --------------------*/
Route::get('/webadmin/manage-logo', [LogoController::class, 'logo'])->middleware('loginCheck');
Route::get('/webadmin/update-logo/{id}', [LogoController::class, 'update_logo'])->middleware('loginCheck');
Route::post('/webadmin/update-logo/{id}', [LogoController::class, 'update'])->name('update-logo')->middleware('loginCheck');

Route::get('/webadmin/manage-social-profiles', [Webpanelcontroller::class, 'social_profiles'])->middleware('loginCheck');
Route::post('/webadmin/update-social-profile', [UpdateSocialProfileController::class, 'update_social_profile'])->name('update-social-profile')->middleware('loginCheck');
Route::get('/webadmin/manage-subscriber', [Webpanelcontroller::class, 'manage_subscriber'])->middleware('loginCheck');
Route::get('/webadmin/delete-subscriber/{id}', [Webpanelcontroller::class, 'delete_subscriber'])->middleware('loginCheck');
Route::get('/webadmin/change-password', [Webpanelcontroller::class, 'change_password'])->middleware('loginCheck');
Route::post('/webadmin/change-password', [Webpanelcontroller::class, 'update_password'])->name('change-password')->middleware('loginCheck');


/*------------------ Manage Pages --------------------*/
Route::get('/webadmin/manage-pages', [PagesController::class, 'manage_pages'])->middleware('loginCheck');
Route::get('/webadmin/update-pages/{id}', [PagesController::class, 'update_pages'])->middleware('loginCheck');
Route::post('/webadmin/update-pages/{id}', [PagesController::class, 'update'])->name('update-pages')->middleware('loginCheck');
Route::get('/webadmin/delete-pages/{id}', [PagesController::class, 'delete_pages'])->middleware('loginCheck');

/*------------------ Manage blog --------------------*/
Route::get('/webadmin/manage-blog', [AdminBlogController::class, 'manage_blog'])->middleware('loginCheck');
Route::get('/webadmin/add-blog', [AdminBlogController::class, 'add_blog'])->middleware('loginCheck');
Route::post('/webadmin/add-blog', [AdminBlogController::class, 'store'])->name('add-blog')->middleware('loginCheck');
Route::get('/webadmin/update-blogs/{id}', [AdminBlogController::class, 'update_blogs'])->middleware('loginCheck');
Route::post('/webadmin/update-blogs/{id}', [AdminBlogController::class, 'update'])->name('update-blogs')->middleware('loginCheck');
Route::get('/webadmin/delete-blog/{id}', [AdminBlogController::class, 'delete_blog'])->middleware('loginCheck');
Route::post('webadmin/blog',[AdminBlogController::class,'blog']);

/*------------------ Manage blogcat --------------------*/
Route::get('/webadmin/manage-blogcat', [AdminBlogCatController::class, 'manage_blogcat'])->middleware('loginCheck');
Route::get('/webadmin/add-blogcat', [AdminBlogCatController::class, 'add_blogcat'])->middleware('loginCheck');
Route::post('/webadmin/add-blogcat', [AdminBlogCatController::class, 'store'])->name('add-blogcat')->middleware('loginCheck');
Route::get('/webadmin/update-blogcat/{id}', [AdminBlogCatController::class, 'update_blogcat'])->middleware('loginCheck');
Route::post('/webadmin/update-blogcat/{id}', [AdminBlogCatController::class, 'update'])->name('update-blogcat')->middleware('loginCheck');
Route::get('/webadmin/delete-blogcat/{id}', [AdminBlogCatController::class, 'delete_blogcat'])->middleware('loginCheck');
Route::post('webadmin/blogcat',[AdminBlogCatController::class,'blogcat']);



/*------------------ Manage Users --------------------*/
Route::get('/webadmin/manage-users',[UsersController::class, 'manage_users'])->middleware('loginCheck');
Route::get('/webadmin/add-user',[UsersController::class, 'add_user'])->middleware('loginCheck');
Route::post('/webadmin/add-user', [UsersController::class, 'store'])->name('add-user')->middleware('loginCheck');
Route::get('/webadmin/delete-user/{id}', [UsersController::class, 'delete_user'])->middleware('loginCheck');
Route::get('/webadmin/update-profile/{id}', [UsersController::class, 'update_profile'])->middleware('loginCheck');
Route::post('/webadmin/update-profile/{id}', [UsersController::class, 'update'])->name('update-profile')->middleware('loginCheck');
Route::post('webadmin/ajax',[UsersController::class,'ajax']);

/*------------------ Manage Owner --------------------*/
Route::get('/webadmin/manage-owner',[OwnersController::class, 'manage_owner'])->middleware('loginCheck');
Route::get('/webadmin/add-owner',[OwnersController::class, 'add_owner'])->middleware('loginCheck');
Route::post('/webadmin/add-owner', [OwnersController::class, 'store'])->name('add-owner')->middleware('loginCheck');
Route::get('/webadmin/delete-owner/{id}', [OwnersController::class, 'delete_owner'])->middleware('loginCheck');
Route::get('/webadmin/update-owner/{id}', [OwnersController::class, 'update_owner'])->middleware('loginCheck');
Route::post('/webadmin/update-owner/{id}', [OwnersController::class, 'update'])->name('update-owner')->middleware('loginCheck');
Route::post('webadmin/owner',[OwnersController::class,'owner']);

/*------------------ Manage Category --------------------*/
Route::get('/webadmin/manage-category',[CategoryController::class, 'manage_category'])->middleware('loginCheck');
Route::get('/webadmin/add-category',[CategoryController::class, 'add_category'])->middleware('loginCheck');
Route::post('/webadmin/add-category', [CategoryController::class, 'store'])->name('add-category')->middleware('loginCheck');
Route::get('/webadmin/delete-category/{id}', [CategoryController::class, 'delete_category'])->middleware('loginCheck');
Route::get('/webadmin/update-category/{id}', [CategoryController::class, 'update_category'])->middleware('loginCheck');
Route::post('/webadmin/update-category/{id}', [CategoryController::class, 'update'])->name('update-category')->middleware('loginCheck');
Route::post('webadmin/cat',[CategoryController::class,'cat']);

/*------------------ Manage Title --------------------*/
Route::get('/webadmin/manage-title',[TitleController::class, 'manage_title'])->middleware('loginCheck');
Route::get('/webadmin/add-title',[TitleController::class, 'add_title'])->middleware('loginCheck');
Route::post('/webadmin/add-title', [TitleController::class, 'store'])->name('add-title')->middleware('loginCheck');
Route::get('/webadmin/delete-title/{id}', [TitleController::class, 'delete_title'])->middleware('loginCheck');
Route::get('/webadmin/update-title/{id}', [TitleController::class, 'update_title'])->middleware('loginCheck');
Route::post('/webadmin/update-title/{id}', [TitleController::class, 'update'])->name('update-title')->middleware('loginCheck');
Route::post('webadmin/title',[TitleController::class,'title']);

/*------------------ Manage koer --------------------*/
Route::get('/webadmin/manage-koer',[KoerController::class, 'manage_koer'])->middleware('loginCheck');
Route::get('/webadmin/add-koer',[KoerController::class, 'add_koer'])->middleware('loginCheck');
Route::post('/webadmin/add-koer', [KoerController::class, 'store'])->name('add-koer')->middleware('loginCheck');
Route::get('/webadmin/delete-koer/{id}', [KoerController::class, 'delete_koer'])->middleware('loginCheck');
Route::get('/webadmin/update-koer/{id}', [KoerController::class, 'update_koer'])->middleware('loginCheck');
Route::post('/webadmin/update-koer/{id}', [KoerController::class, 'update'])->name('update-koer')->middleware('loginCheck');
Route::post('webadmin/koer',[KoerController::class,'koer']);

/*------------------ Manage Registry --------------------*/
Route::get('/webadmin/manage-registry',[RegistryController::class, 'manage_registry'])->middleware('loginCheck');
Route::get('/webadmin/add-registry',[RegistryController::class, 'add_registry'])->middleware('loginCheck');
Route::post('/webadmin/add-registry', [RegistryController::class, 'store'])->name('add-registry')->middleware('loginCheck');
Route::get('/webadmin/delete-registry/{id}', [RegistryController::class, 'delete_registry'])->middleware('loginCheck');
Route::get('/webadmin/update-registry/{id}', [RegistryController::class, 'update_registry'])->middleware('loginCheck');
Route::post('/webadmin/update-registry/{id}', [RegistryController::class, 'update'])->name('update-registry')->middleware('loginCheck');
Route::post('webadmin/registry',[RegistryController::class,'registry']);

/*------------------ Manage Hips --------------------*/
Route::get('/webadmin/manage-hips',[HipsController::class, 'manage_hips'])->middleware('loginCheck');
Route::get('/webadmin/add-hips',[HipsController::class, 'add_hips'])->middleware('loginCheck');
Route::post('/webadmin/add-hips', [HipsController::class, 'store'])->name('add-hips')->middleware('loginCheck');
Route::get('/webadmin/delete-hips/{id}', [HipsController::class, 'delete_hips'])->middleware('loginCheck');
Route::get('/webadmin/update-hips/{id}', [HipsController::class, 'update_hips'])->middleware('loginCheck');
Route::post('/webadmin/update-hips/{id}', [HipsController::class, 'update'])->name('update-hips')->middleware('loginCheck');
Route::post('webadmin/hips',[HipsController::class,'hips']);

/*------------------ Manage Elbow --------------------*/
Route::get('/webadmin/manage-elbows',[ElbowController::class, 'manage_elbows'])->middleware('loginCheck');
Route::get('/webadmin/add-elbows',[ElbowController::class, 'add_elbows'])->middleware('loginCheck');
Route::post('/webadmin/add-elbows', [ElbowController::class, 'store'])->name('add-elbows')->middleware('loginCheck');
Route::get('/webadmin/delete-elbows/{id}', [ElbowController::class, 'delete_elbows'])->middleware('loginCheck');
Route::get('/webadmin/update-elbows/{id}', [ElbowController::class, 'update_elbows'])->middleware('loginCheck');
Route::post('/webadmin/update-elbows/{id}', [ElbowController::class, 'update'])->name('update-elbows')->middleware('loginCheck');
Route::post('webadmin/elbow',[ElbowController::class,'elbow']);

/*------------------ Manage Breeder --------------------*/
Route::get('/webadmin/manage-breeder',[BreederController::class, 'manage_breeder'])->middleware('loginCheck');
Route::get('/webadmin/add-breeder',[BreederController::class, 'add_breeder'])->middleware('loginCheck');
Route::post('/webadmin/add-breeder', [BreederController::class, 'store'])->name('add-breeder')->middleware('loginCheck');
Route::get('/webadmin/delete-breeder/{id}', [BreederController::class, 'delete_breeder'])->middleware('loginCheck');
Route::get('/webadmin/update-breeder/{id}', [BreederController::class, 'update_breeder'])->middleware('loginCheck');
Route::post('/webadmin/update-breeder/{id}', [BreederController::class, 'update'])->name('update-breeder')->middleware('loginCheck');
Route::post('webadmin/breeder',[BreederController::class,'breeder']);

/*------------------ Manage Video --------------------*/
Route::get('/webadmin/manage-video',[VideoController::class, 'manage_video'])->middleware('loginCheck');
Route::get('/webadmin/add-video',[VideoController::class, 'add_video'])->middleware('loginCheck');
Route::post('/webadmin/add-video', [VideoController::class, 'store'])->name('add-video')->middleware('loginCheck');
Route::get('/webadmin/delete-video/{id}', [VideoController::class, 'delete_video'])->middleware('loginCheck');
Route::get('/webadmin/update-video/{id}', [VideoController::class, 'update_video'])->middleware('loginCheck');
Route::post('/webadmin/update-video/{id}', [VideoController::class, 'update'])->name('update-video')->middleware('loginCheck');
Route::post('webadmin/videos',[VideoController::class,'videos']);

/*------------------ Manage Picture --------------------*/
Route::get('/webadmin/manage-picture',[PictureController::class, 'manage_picture'])->middleware('loginCheck');
Route::get('/webadmin/add-picture',[PictureController::class, 'add_picture'])->middleware('loginCheck');
Route::post('/webadmin/add-picture', [PictureController::class, 'store'])->name('add-picture')->middleware('loginCheck');
Route::get('/webadmin/delete-image/{id}', [PictureController::class, 'delete_picture'])->middleware('loginCheck');
Route::get('/webadmin/update-image/{id}', [PictureController::class, 'update_picture'])->middleware('loginCheck');
Route::post('/webadmin/update-image/{id}', [PictureController::class, 'update'])->name('update-image')->middleware('loginCheck');
Route::post('webadmin/images',[PictureController::class,'images']);

/*------------------ Manage Pedigree --------------------*/
Route::get('/webadmin/manage-pedigree',[PedigreeController::class, 'manage_pedigree'])->middleware('loginCheck');
Route::get('/webadmin/add-pedigree',[PedigreeController::class, 'add_pedigree'])->middleware('loginCheck');
Route::post('/webadmin/add-pedigree', [PedigreeController::class, 'store'])->name('add-pedigree')->middleware('loginCheck');
Route::get('/webadmin/delete-pedigree/{id}/{reg}', [PedigreeController::class, 'delete_pedigree'])->middleware('loginCheck');
Route::get('/webadmin/update-pedigree/{id}', [PedigreeController::class, 'update_pedigree'])->middleware('loginCheck');
Route::post('/webadmin/update-pedigree/{id}', [PedigreeController::class, 'update'])->name('update-pedigree')->middleware('loginCheck');
Route::post('webadmin/pedi',[PedigreeController::class,'pedi']);

