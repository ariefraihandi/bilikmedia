<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RedirectIfAuthenticated; 
use App\Http\Middleware\RedirectIfNotAuthenticated; 
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\EnvantoDownloaderController;

Route::get('/sitemap.xml', [SitemapController::class, 'viewSitemap']);


Route::get('/',                             [HomeController::class, 'index'])->name('index');

Route::get('/auth/register',                [AuthController::class, 'showRegisterForm'])->name('showRegisterForm')->middleware(RedirectIfAuthenticated::class);
Route::get('/auth/login',                   [AuthController::class, 'showLoginForm'])->name('showLoginForm')->middleware(RedirectIfAuthenticated::class);
Route::get('/logout',                       [AuthController::class, 'logout'])->name('logout');
Route::post('register',                     [AuthController::class, 'register'])->name('register');
Route::post('login',                        [AuthController::class, 'login'])->name('login');

Route::get('/envanto-downloader',           [EnvantoDownloaderController::class, 'showEnvantoDownloader'])->name('envanto.downloader');

Route::get('/product',                      [ProductController::class, 'showAllProduct'])->name('showAllProduct');
Route::get('/product/category/{slug}',      [ProductController::class, 'showProductByCategory'])->name('showProductByCategory');
Route::get('/product-details/{slug}',       [ProductController::class, 'showProductDetails'])->name('product.details');
Route::get('/search-products',              [ProductController::class, 'searchProducts'])->name('search.products');

Route::get('/download/{productId}',         [DownloadController::class, 'generateDownloadLink'])->name('generate.download.link');
Route::get('/download-file/{token}',        [DownloadController::class, 'downloadFile'])->name('download.file');
Route::get('/request-download',             [DownloadController::class, 'requestDownload'])->name('request.download');



Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    Route::get('/dashboard',                [DashboardController::class, 'showDashboard'])->name('showDashboard');
    Route::get('/add/product',              [ProductController::class, 'showProduct'])->name('show.add.product');
    Route::get('/list/product',             [ProductController::class, 'showProductlist'])->name('show.list.product');
    Route::post('/add/product',             [ProductController::class, 'storeProduct'])->name('product.store');
    Route::post('/store-category',          [ProductController::class, 'storeCategory'])->name('store-category');
    Route::get('/get-product-list-data',    [ProductController::class, 'getProductListData'])->name('get.product.list.data');
});