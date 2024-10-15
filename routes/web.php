<?php

//Controller
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\DownloadController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\HomeController;
    use App\Http\Middleware\RedirectIfAuthenticated; 
    use App\Http\Middleware\RedirectIfNotAuthenticated; 
    use App\Http\Controllers\AdController;
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\CreditController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SitemapController;
    use App\Http\Controllers\EnvantoDownloaderController;
    use App\Http\Controllers\FreepikDownloaderController;
//!Controller

//Index
    Route::get('/robots.txt', function () {return response("User-agent: *\nDisallow: /admin", 200)->header('Content-Type', 'text/plain');});
    Route::get('/sitemap.xml', [SitemapController::class, 'viewSitemap']);
//!Index

Route::get('/blog/website-template',        [BlogController::class, 'showWebsiteTemplate'])->name('blog.websiteTemp');
Route::get('/blog/adobe-photoshop',         [BlogController::class, 'showAdobePhotoshop'])->name('blog.adobePhotoshop');



Route::get('/',                             [HomeController::class, 'index'])->name('index');

Route::get('/auth/register',                [AuthController::class, 'showRegisterForm'])->name('showRegisterForm')->middleware(RedirectIfAuthenticated::class);
Route::get('/auth/login',                   [AuthController::class, 'showLoginForm'])->name('showLoginForm')->middleware(RedirectIfAuthenticated::class);
Route::get('/logout',                       [AuthController::class, 'logout'])->name('logout');
Route::post('register',                     [AuthController::class, 'register'])->name('register');
Route::post('login',                        [AuthController::class, 'login'])->name('login');
Route::get('verify-email',                  [AuthController::class, 'verify'])->name('verify-email');

Route::get('/envato-downloader',            [EnvantoDownloaderController::class, 'showEnvantoDownloader'])->name('envanto.downloader');
Route::get('/freepik-downloader',           [FreepikDownloaderController::class, 'showFreepikDownloader'])->name('freepik.downloader');

Route::get('/product',                      [ProductController::class, 'showAllProduct'])->name('showAllProduct');
Route::get('/product/category/{slug}',      [ProductController::class, 'showProductByCategory'])->name('showProductByCategory');
Route::get('/product/rating/{rating}',      [ProductController::class, 'filterByRating'])->name('filterByRating');
Route::get('/product-details/{slug}',       [ProductController::class, 'showProductDetails'])->name('product.details');
Route::get('/search-products',              [ProductController::class, 'searchProducts'])->name('search.products');

Route::get('/download/{productId}',         [DownloadController::class, 'generateDownloadLink'])->name('generate.download.link');
Route::get('/download-file/{token}',        [DownloadController::class, 'downloadFile'])->name('download.file');
Route::get('/rating/{token}',               [DownloadController::class, 'showRating'])->name('rating.show');
Route::post('/request-download',            [DownloadController::class, 'requestDownload'])->name('request.download');
Route::post('/request-download-freepik',    [DownloadController::class, 'requestDownloadFreepik'])->name('request.download.freepik');
// Route::post('/submit-download',             [DownloadController::class, 'submitDownload'])->name('submit.download');
Route::post('/rating',                      [DownloadController::class, 'submitRating'])->name('rating.submit');

Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
    Route::get('/dashboard',                        [DashboardController::class, 'showDashboard'])->name('showDashboard');
    Route::get('/add/product',                      [ProductController::class, 'showProduct'])->name('show.add.product');
    Route::get('/list/product',                     [ProductController::class, 'showProductlist'])->name('show.list.product');
    Route::post('/add/product',                     [ProductController::class, 'storeProduct'])->name('product.store');
    Route::post('/store-category',                  [ProductController::class, 'storeCategory'])->name('store-category');
    Route::get('/get-product-list-data',            [ProductController::class, 'getProductListData'])->name('get.product.list.data');
    
    Route::get('/profile',                          [UserController::class, 'index'])->name('user.profile');
    Route::get('/user-list',                        [UserController::class, 'showUserList'])->name('user.list');
    Route::get('/refferal-list',                    [UserController::class, 'showReffList'])->name('refferal.list');

    Route::post('/update-profile',                  [UserController::class, 'updateProfile'])->name('update.profile');
    Route::get('/credit',                           [CreditController::class, 'showCredit'])->name('credit.dashboard');
    Route::get('/credit-redemption',                [CreditController::class, 'showCreditRedemtion'])->name('credit.redemption');
    Route::post('/claim-daily-credit',              [CreditController::class, 'claimDailyCredit'])->name('claim.daily.credit');
    Route::post('/claim-sharing-credit',            [CreditController::class, 'claimSharingCredit'])->name('claimSharingCredit');
    Route::post('/redeemAdCode',                    [CreditController::class, 'claimCodeCredit'])->name('redeemAdCode');
    Route::post('/claim-refferal',                  [CreditController::class, 'claimRefferal'])->name('claimRefferal');

    Route::get('/download/request/list',            [DownloadController::class, 'showDownloadRequestlist'])->name('showDownloadRequestlist');
    Route::get('/user/download/history',            [DownloadController::class, 'showDownloadHistory'])->name('show.downloadHistory');
    Route::post('/send-download-notification',      [DownloadController::class, 'sendDownloadNotification'])->name('sendDownloadNotification');
    Route::post('/send-invalid-notification',       [DownloadController::class, 'sendInvalidNotification'])->name('sendInvalidNotification');
    Route::delete('/delete-download-request/{id}',  [DownloadController::class, 'deleteDownloadRequest']);
    Route::post('/fix-url',                         [DownloadController::class, 'fixUrl'])->name('fix.url');

    Route::post('/store-ad-tokens',                 [CreditController::class, 'storeAdTokens'])->name('storeAdTokens');
    Route::post('/generate-reff',                   [CreditController::class, 'generateReff'])->name('generate-reff');

    Route::get('/blog/bilikmedia/{token}',          [BlogController::class, 'showAdOne'])->name('blog.adsOne');
    Route::get('/blog/envato-downloader/{token}',   [BlogController::class, 'showAdTwo'])->name('blog.adsTwo');
    Route::get('/blog/become-a-member/{token}',     [BlogController::class, 'showAdThree'])->name('blog.adsThree');
    Route::get('/blog/freepik-downloader/{token}',  [BlogController::class, 'showAdFour'])->name('blog.adsFour');
    Route::get('/blog/mixkit-downloader/{token}',   [BlogController::class, 'showAdFive'])->name('blog.adsFive');


    Route::post('/ads-store',                       [AdController::class, 'adsStore'])->name('ads.store');
    Route::get('/user-list-datatables',             [UserController::class, 'getUsersForDataTables'])->name('user.list.datatables');
    
    Route::post('/notify-incomplete',               [UserController::class, 'notifyIncomplete'])->name('notify.incomplete');


});