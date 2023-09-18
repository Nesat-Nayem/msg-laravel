<?php

use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FEProviderController;
use App\Http\Controllers\FEUserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GeneralSettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProviderContoller;
use App\Http\Controllers\PushNotificationsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SeoSettingsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RazorpayController;


Auth::routes();

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return '<div style="text-align: center;"><h1>All Cleared</h1></div>';
});


//Front
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('aboutus', [FrontendController::class, 'aboutus'])->name('aboutus');
Route::get('addservice', [FrontendController::class, 'addservice'])->name('addservice');
Route::get('categories', [FrontendController::class, 'categories'])->name('categories');
Route::any('category/{categoryslug}', [FrontendController::class, 'category'])->name('category');
Route::get('contactus', [FrontendController::class, 'contactus'])->name('contactus');
Route::post('contactus-store', [FrontendController::class, 'contactus_store'])->name('contactus.store');
Route::get('favourites', [FrontendController::class, 'favourites'])->name('favourites');
Route::get('services', [FrontendController::class, 'services'])->name('services');
Route::post('search-services', [FrontendController::class, 'searchservices'])->name('search.services');
Route::post('search-service', [FrontendController::class, 'searchservice'])->name('search.service');
Route::get('servicedetails/{slug}', [FrontendController::class, 'servicedetails'])->name('servicedetails');
Route::get('/getCityFromState/{state}', [FrontendController::class, 'getCityFromState'])->name('ajax.getCityFromState');
Route::get('/getSubCategoryFromCategory/{category}', [FrontendController::class, 'getSubCategoryFromCategory'])->name('ajax.getSubCategoryFromCategory');
Route::get('/getStateFromCountry/{country}', [FrontendController::class, 'getStateFromCountry'])->name('ajax.getStateFromCountry');
Route::get('search', [FrontendController::class, 'search'])->name('search');

//CKEditor
Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');


// User
Route::post('userregister', [FEUserController::class, 'userregister'])->name('userregister');
Route::get('userlogin', [FEUserController::class, 'userlogin'])->name('user.login');
Route::post('userloginstore', [FEUserController::class, 'userloginstore'])->name('user.userloginstore');
Route::post('user-logincheck/{slug}', [FEUserController::class, 'user_logincheck'])->name('user.logincheck');
// After User Login
Route::group(['middleware' => ['auth']], function () {
    Route::get('bookservice/{slug}', [FEUserController::class, 'bookservice'])->name('bookservice');
    Route::post('bookservice-store', [FEUserController::class, 'bookservice_store'])->name('bookservice.store');
    Route::get('userbookings', [FEUserController::class, 'userbookings'])->name('userbookings');
    Route::get('userdashboard', [FEUserController::class, 'userdashboard'])->name('userdashboard');
    Route::get('userpayment', [FEUserController::class, 'userpayment'])->name('userpayment');
    Route::get('userreviews', [FEUserController::class, 'userreviews'])->name('userreviews');
    Route::get('usersettings/{id}', [FEUserController::class, 'usersettings'])->name('usersettings');
    Route::any('usersettings-update/{id}', [FEUserController::class, 'usersettings_update'])->name('usersettings.update');
    Route::get('user-changepassword/{id}', [FEUserController::class, 'user_changepassword'])->name('user.changepassword');
    Route::any('user-updatepassword/{id}', [FEUserController::class, 'user_updatepassword'])->name('user.updatepassword');
    Route::get('userwallet', [FEUserController::class, 'userwallet'])->name('userwallet');
    Route::any('UserDetails', [RazorpayController::class, 'UserDetails'])->name('UserDetails');
    Route::any('adjust-wallet', [RazorpayController::class, 'adjust_wallet'])->name('adjust.wallet');
    Route::get('userlogout', [FEUserController::class, 'userlogout'])->name('user.userlogout');
});


// Admin
Route::get('adminlogin', [AdminController::class, 'login'])->name('admin.login');
Route::post('adminloginstore', [AdminController::class, 'adminloginstore'])->name('admin.adminloginstore');
// After Admin Login
Route::group(['middleware' => ['auth:adminpanel']], function () {
    Route::get('admindashboard', [AdminController::class, 'admindashboard'])->name('admindashboard');
    Route::get('adminlogout', [AdminController::class, 'adminlogout'])->name('admin.adminlogout');
    Route::get('admin-totalreport', [AdminController::class, 'totalreport'])->name('admin.totalreport');
    Route::get('admin-generalsettings', [AdminController::class, 'generalsettings'])->name('admin.generalsettings');
    Route::get('admin-changepassword', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    Route::get('admin-othersettings', [AdminController::class, 'othersettings'])->name('admin.othersettings');
    Route::any('admin-updatepassword', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');
    Route::get('admin-notifications', [AdminController::class, 'admin_notifications'])->name('admin.notifications');
    Route::resource('admin-service', ServiceController::class);
    Route::get('admin-pendingservices', [ServiceController::class, 'pendingservices'])->name('admin.pendingservices');
    Route::get('admin-deletedservices', [ServiceController::class, 'deletedservices'])->name('admin.deletedservices');
    Route::get('admin-inactiveservices', [ServiceController::class, 'inactiveservices'])->name('admin.inactiveservices');
    Route::any('admin-service_filter', [ServiceController::class, 'service_filter'])->name('admin.service_filter');
    Route::resource('admin-category', CategoryController::class);
    Route::resource('admin-subcategory', SubCategoryController::class);
    Route::get('admin-earnings', [ReportController::class, 'earnings'])->name('admin.earnings');
    Route::get('admin-sellerbalance', [ReportController::class, 'seller_balance'])->name('admin.sellerbalance');
    Route::get('admin-revenue', [ReportController::class, 'revenue'])->name('admin.revenue');
    Route::resource('admin-pushnotifications', PushNotificationsController::class);
    Route::resource('admin-country', CountryController::class);
    Route::resource('admin-state', StateController::class);
    Route::resource('admin-city', CityController::class);
    Route::resource('admin-provider', ProviderContoller::class);
    Route::resource('addadmin', AddAdminController::class);
    Route::resource('admin-users', UserController::class);
    Route::resource('adminsubscription', SubscriptionController::class);
    Route::resource('admincontactus', ContactUsController::class);
    Route::resource('admin-seosettings', SeoSettingsController::class);
    Route::resource('admin-generalsettings', GeneralSettingsController::class);
    Route::any('markNotification', [AdminController::class, 'markNotification'])->name('markNotification');
    Route::get('admin-userwallet', [AdminController::class, 'admin_userwallet'])->name('admin.userwallet');
});


// Provider
Route::get('providerlogin', [FEProviderController::class, 'providerlogin'])->name('provider.providerlogin');
Route::post('providerloginstore', [FEProviderController::class, 'providerloginstore'])->name('provider.providerloginstore');
Route::post('providerregister', [FEProviderController::class, 'providerregister'])->name('providerregister');
Route::get('subscriptionplan/{id}', [FEProviderController::class, 'subscriptionplan'])->name('subscriptionplan');
Route::post('subplan_store', [FEProviderController::class, 'subplan_store'])->name('subplan_store');
// After Provider Login
Route::group(['middleware' => ['auth:providerpanel']], function () {
    Route::get('myservices', [FEProviderController::class, 'myservices'])->name('myservices');
    Route::get('inactive-services', [FEProviderController::class, 'inactiveservices'])->name('inactive.services');
    Route::get('addservice', [FEProviderController::class, 'addservice'])->name('addservice');
    Route::post('servicestore', [FEProviderController::class, 'servicestore'])->name('servicestore');
    Route::get('edit-service/{slug}', [FEProviderController::class, 'editservice'])->name('editservice');
    Route::any('update-service/{slug}', [FEProviderController::class, 'updateservice'])->name('updateservice');
    Route::get('provideravailability', [FEProviderController::class, 'provideravailability'])->name('provideravailability');
    Route::any('provideravailability-store', [FEProviderController::class, 'provideravailability_store'])->name('provideravailability.store');
    Route::get('providerbookings', [FEProviderController::class, 'providerbookings'])->name('providerbookings');
    Route::get('providerdashboard', [FEProviderController::class, 'providerdashboard'])->name('providerdashboard');
    Route::get('providerpayment', [FEProviderController::class, 'providerpayment'])->name('providerpayment');
    Route::get('providerreviews', [FEProviderController::class, 'providerreviews'])->name('providerreviews');
    Route::get('providersettings/{id}', [FEProviderController::class, 'providersettings'])->name('providersettings');
    Route::any('providersettings-update/{id}', [FEProviderController::class, 'providersettings_update'])->name('providersettings.update');
    Route::get('provider-changepassword/{id}', [FEProviderController::class, 'provider_changepassword'])->name('provider.changepassword');
    Route::any('provider-updatepassword/{id}', [FEProviderController::class, 'provider_updatepassword'])->name('provider.updatepassword');
    Route::get('providersubscription', [FEProviderController::class, 'providersubscription'])->name('providersubscription');
    Route::get('providerwallet', [FEProviderController::class, 'providerwallet'])->name('providerwallet');
    Route::get('provider-notifications', [FEProviderController::class, 'provider_notifications'])->name('provider.notifications');
    Route::get('providerlogout', [FEProviderController::class, 'providerlogout'])->name('provider.providerlogout');
    Route::any('provider-markNotification', [FEProviderController::class, 'provider_markNotification'])->name('provider.markNotification');
});
