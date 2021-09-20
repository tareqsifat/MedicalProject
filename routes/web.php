<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;

// use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\SubCategoryController;
// use App\Http\Controllers\Admin\BlogController;
// use App\Http\Controllers\Admin\ServiceController;
// use App\Http\Controllers\Admin\AppointmentController;
// use App\Http\Controllers\Admin\FaqController;
// use App\Http\Controllers\Admin\TestimonialController;
// use App\Http\Controllers\Admin\FooterController;
// use App\Http\Controllers\Admin\SubscribeController;
// use App\Http\Controllers\Admin\SliderController;
// use App\Http\Controllers\Admin\OurWorkController;
// use App\Http\Controllers\Admin\OpeningHourController;
// use App\Http\Controllers\Admin\AppointmentQueController;
// use App\Http\Controllers\Admin\AppointmentPageController;
// use App\Http\Controllers\Admin\DepartmentController;
// use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\ReplyController;

// use App\Http\Controllers\Admin\TreatmentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group( [
    'middleware'=>['auth'],
],function(){

    // Route::get('/','AdminController@index')->name('admin_index');
    // admin 
    Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
    
    //user
    Route::get('/user', [UserController::class, 'index'])->name('user_index');
});
// Route::get('/user/view/{id}', [UserController::class, 'index'])->name('user_index');
// Route::get('/user/create', [UserController::class, 'index'])->name('user_index');
// Route::post('/user/store', [UserController::class, 'index'])->name('user_index');
// Route::get('/user/edit/{id}', [UserController::class, 'index'])->name('user_index');
// Route::post('/user/update', [UserController::class, 'index'])->name('user_index');
// Route::post('/user/delete/{id}', [UserController::class, 'index'])->name('user_index');

//Main_Category
// Route::get('/category', [CategoryController::class , 'index'])->name('category_index');
// Route::get('/category/view/{id}', [CategoryController::class , 'show'])->name('category_view');
// Route::get('/category/create', [CategoryController::class , 'create'])->name('category_create');
// Route::post('/category/store', [CategoryController::class , 'store'])->name('category_store');
// Route::get('/category/edit/{id}', [CategoryController::class , 'edit'])->name('category_edit');
// Route::get('/category/update', [CategoryController::class , 'update'])->name('category_update');
// Route::get('/category/delete/{id}', [CategoryController::class , 'destroy'])->name('category_delete');

Route::group([
    'prefix'=>'admin',
    'middleware'=>['auth'],
    'namespace'=>'App\Http\Controllers\Admin'

],function(){
    //category
    Route::resource('category', CategoryController::class);
    //subCategory
    Route::resource('subcategory', SubCategoryController::class);
    // Blog
    Route::resource('blogs', BlogController::class);
    //slider
    Route::resource('slider', SliderController::class);
    //service
    Route::resource('service', ServiceController::class);
    //Appointment
    Route::resource('appointments', AppointmentController::class);
    //FAQ
    Route::resource('faqs', FaqController::class);
    //FAQ
    Route::resource('testimonial', TestimonialController::class);  
    //Footer
    Route::resource('footer', FooterController::class);  
    //Subscribe
    Route::resource('subscribe', SubscribeController::class);  
    //OutWork
    Route::resource('ourwork', OurWorkController::class);  
    //openingHour
    Route::resource('opening_hour', OpeningHourController::class);  
    //AppointMent_Questions
    Route::resource('appoint_que', AppointmentQueController::class);  
    //AppointMent_Page
    Route::resource('appoint_page', AppointmentPageController::class);  
    //Doctor List
    Route::resource('doctors', DoctorsController::class);  
    //Treatment 
    Route::resource('treatment', TreatmentController::class);
    //Department
    Route::resource('departments', DepartmentController::class);
});
    // Comments
    Route::resource('comments', CommentController::class);
    // Reply
    Route::resource('reply', ReplyController::class);

Route::group([
    'prefix'=>'admin',
    'middleware'=>['auth'],

],function(){
    // Notification
    Route::get('all_notification',[NotificationController::class,'index'])->name('notification_index');
});


Route::get('/', [WebsiteController::class, 'index'])->name('website_index');
Route::get('/about_us', [WebsiteController::class, 'aboutUs'])->name('website_about');
Route::get('/department', [WebsiteController::class, 'department'])->name('website_department');
Route::get('/appointment', [WebsiteController::class, 'appointment'])->name('website_appointment');
Route::get('/doctor', [WebsiteController::class, 'doctor'])->name('website_doctor');
Route::get('/doctorlist', [WebsiteController::class, 'doctorList'])->name('website_doctor_list');
Route::get('/doctor/{slug}', [WebsiteController::class, 'singleDoctor'])->name('website_single_doctor');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('website_blog');
Route::get('/blog/{slug}', [WebsiteController::class, 'blogShow'])->name('website_blog_show');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website_contact');

// Route::post('/add_notification',[NotificationController::class,'store'])->name('notification_store');


// Route::get('/', function () {
//     return view('welcome');
// });
