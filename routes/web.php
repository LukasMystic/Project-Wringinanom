<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdventureController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ArchiveVideoController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MainEcomController;
use App\Http\Controllers\MainNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiverController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;

Route::redirect('home', 'adminPage');
Route::get('/', [MainController::class, 'dashboard'])->middleware('guest');

// Autentikasi
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('', [AuthController::class, 'index'])->name('login');
    Route::get('/redirect', [AuthController::class, 'redirect']);
    Route::get('/callback', [AuthController::class, 'callback']);
});
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Admin Page
Route::prefix('adminPage')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.home');
    Route::get('/homepage', [AdminController::class, 'dashboard']);
    Route::get('/ecommerce', [AdminController::class, 'ecommerce'])->name('product.home');
    Route::get('/news', [AdminController::class, 'news'])->name('news.home');
    Route::get('/archive', [AdminController::class, 'archive'])->name('archive.home');
    Route::get('/archive/video', [AdminController::class, 'video'])->name('archive.home.video');

    Route::get('/ecommerce/category', [AdminController::class, 'viewCategory'])->name('category.home');
    Route::get('/river', [AdminController::class, 'river'])->name('river.home');
    Route::get('/adventure', [AdminController::class, 'adventure'])->name('adventure.home');
    Route::get('/edukasi', [AdminController::class, 'edukasi'])->name('edukasi.home');
    Route::get('/testimony', [AdminController::class, 'testimony'])->name('testimony.home');
    Route::get('/homePage/news', [AdminCOntroller::class, 'dashboard'])->name('homepage.home');
    Route::get('/homePage/products', [AdminCOntroller::class, 'homepageProduct'])->name('homepage.home.product');
});

//Admin Page
Route::post('adminPage/homePage/news', [AdminCOntroller::class, 'storeNews'])->name('homepage.storeNews');
Route::post('adminPage/homePage/products', [AdminCOntroller::class, 'storeProducts'])->name('homepage.storeProducts');


// Ecommerce
Route::prefix('adminPage/ecommerce')->middleware('auth')->group(function () {
    // Route::post('/', [ProductController::class, 'store'])->name('product.store');
    // Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    // Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    // Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    // Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
    // Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    // Route::get('/category/{category}', [ProductController::class, 'category'])->name('product.category');
    Route::resource('product', ProductController::class);
});


// Category Ecommerce
Route::prefix('adminPage/ecommerce/categoryPage')->middleware('auth')->group(function () {
    Route::post('/', [CategoryController::class, 'storeCategory'])->name('product.store.category');
    Route::get('/create', [CategoryController::class, 'createCategory'])->name('product.create.category');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('product.edit.category');
    Route::post('/update/{category}', [CategoryController::class, 'update'])->name('product.update.category');
    Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('product.delete.category');
});

//News
Route::prefix('adminPage/news')->middleware('auth')->group(function () {
    Route::post('/', [NewsController::class, 'store'])->name('news.store');
    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    Route::delete('/delete/{news}', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/search', [NewsController::class, 'search'])->name('news.search');
});

// River
Route::prefix('adminPage/river')->middleware('auth')->group(function () {
    Route::post('/', [RiverController::class, 'store'])->name('river.store');
    Route::get('/create', [RiverController::class, 'create'])->name('river.create');
    Route::delete('/delete/{river}', [RiverController::class, 'delete'])->name('river.delete');
    Route::get('/edit/{river}', [RiverController::class, 'edit'])->name('river.edit');
    Route::post('/update/{river}', [RiverController::class, 'update'])->name('river.update');
    Route::get('/search', [RiverController::class, 'search'])->name('river.search');
});

// Adventure
Route::prefix('adminPage/adventure')->middleware('auth')->group(function () {
    Route::post('/', [AdventureController::class, 'store'])->name('adventure.store');
    Route::get('/create', [AdventureController::class, 'create'])->name('adventure.create');
    Route::delete('/delete/{adventure}', [AdventureController::class, 'delete'])->name('adventure.delete');
    Route::get('/edit/{adventure}', [AdventureController::class, 'edit'])->name('adventure.edit');
    Route::post('/update/{adventure}', [AdventureController::class, 'update'])->name('adventure.update');
    Route::get('/search', [AdventureController::class, 'search'])->name('adventure.search');
});

// Edukasi
Route::prefix('adminPage/edukasi')->middleware('auth')->group(function () {
    Route::post('/', [EdukasiController::class, 'store'])->name('edukasi.store');
    Route::get('/create', [EdukasiController::class, 'create'])->name('edukasi.create');
    Route::delete('/delete/{edukasi}', [EdukasiController::class, 'delete'])->name('edukasi.delete');
    Route::get('/edit/{edukasi}', [EdukasiController::class, 'edit'])->name('edukasi.edit');
    Route::post('/update/{edukasi}', [EdukasiController::class, 'update'])->name('edukasi.update');
    Route::get('/search', [EdukasiController::class, 'search'])->name('edukasi.search');
});

// Contact
Route::prefix('adminPage/contact')->middleware('auth')->group(function () {
    Route::get('/edit/{contact}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/update/{contact}', [ContactController::class, 'update'])->name('contact.update');
});

// Testimony
Route::prefix('adminPage/testimony')->middleware('auth')->group(function () {
    Route::post('/', [TestimonyController::class, 'store'])->name('testimony.store');
    Route::get('/create', [TestimonyController::class, 'create'])->name('testimony.create');
    Route::delete('/delete/{testimony}', [TestimonyController::class, 'delete'])->name('testimony.delete');
    Route::get('/edit/{testimony}', [TestimonyController::class, 'edit'])->name('testimony.edit');
    Route::post('/update/{testimony}', [TestimonyController::class, 'update'])->name('testimony.update');
    Route::get('/search', [TestimonyController::class, 'search'])->name('testimony.search');
});

// Archive
Route::prefix('adminPage/archive')->middleware('auth')->group(function () {
    Route::post('/', [ArchiveController::class, 'store'])->name('archive.store');
    Route::get('/create', [ArchiveController::class, 'create'])->name('archive.create');
    Route::delete('/delete/{archive}', [ArchiveController::class, 'delete'])->name('archive.delete');
    Route::get('/edit/{archive}', [ArchiveController::class, 'edit'])->name('archive.edit');
    Route::post('/update/{archive}', [ArchiveController::class, 'update'])->name('archive.update');
    Route::get('/search', [ArchiveController::class, 'search'])->name('archive.search');
});

Route::prefix('adminPage/archive/video')->middleware('auth')->group(function () {
    Route::post('/', [ArchiveVideoController::class,'store'])->name('archive.video.store');
    Route::get('/create', [ArchiveVideoController::class,'create'])->name('archive.video.create');
    Route::get('/search', [ArchiveVideoController::class,'search'])->name('archive.video.search');
    Route::delete('/delete/{archive}', [ArchiveVideoController::class, 'delete'])->name('archive.video.delete');
    Route::get('/edit/{archive}', [ArchiveVideoController::class, 'edit'])->name('archive.video.edit');
    Route::post('/update/{archive}', [ArchiveVideoController::class, 'update'])->name('archive.video.update');

});

//HomePage
Route::prefix('homePage')->middleware('guest')->group(function () {
    Route::get('/', [MainController::class, 'dashboard'])->name('home.main');
    Route::get('/news', [MainController::class, 'news'])->name('news.main');
    Route::get('/archive', [MainController::class, 'archive'])->name('archive.main');
    Route::get('/ecommerce', [MainController::class, 'ecommerce'])->name('ecommerce.main');
    Route::get('/package/river', [MainController::class, 'river'])->name('package_river.main');
    Route::get('/package/adventure', [MainController::class, 'adventure'])->name('package_adventure.main');
    Route::get('/package/edukasi', [MainController::class, 'education'])->name('package_education.main');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact.main');
});

//HomePage News
Route::prefix('homePage/news')->middleware('guest')->group(function () {
    Route::get('/search', [MainNewsController::class, 'search'])->name('main.news.search');
    Route::get('/artikel/{news}', [MainNewsController::class, 'artikel'])->name('main.news.artikel');
});

//HomePage Ecommerce
Route::prefix('homePage/ecommerce')->middleware('guest')->group(function () {
    Route::get('/search', [MainEcomController::class, 'search'])->name('main.ecommerce.search');
});
