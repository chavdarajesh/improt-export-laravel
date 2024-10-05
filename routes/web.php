<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\Admin\NewsletterMailController as AdminNewsletterMailController;
use App\Http\Controllers\Admin\HomeSliderController as AdminHomeSliderController;
use App\Http\Controllers\Admin\DirectorController as AdminDirectorController;
use App\Http\Controllers\Admin\SubcategoryController as AdminSubcategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController as AdminSubSubCategoryController;
use App\Http\Controllers\Admin\LogoController as AdminLogoController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\PagesController as FrontPagesController;

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Auth Route start
Route::get('/admin/login', [AdminAuthController::class, 'loginGet'])->name('admin.login.get');
Route::post('/admin/login/save', [AdminAuthController::class, 'loginSave'])->name('admin.login.save');

Route::get('/admin/password/forgot', [AdminAuthController::class, 'passwordForgotGet'])->name('admin.password.forgot.get');
Route::post('admin/password/forgot/save', [AdminAuthController::class, 'passwordForgotSave'])->name('admin.password.forgot.save');

Route::get('/admin/password/reset/{token}', [AdminAuthController::class, 'passwordResetGet'])->name('admin.password.reset.get');
Route::post('/admin/password/reset/save', [AdminAuthController::class, 'passwordResetSave'])->name('admin.password.reset.save');
// Admin Auth Route end

// Admin route start
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'is_admin'], function () {

    // dashboard route start
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    // dashboard route end

    // profile setting Modlue start
    Route::get('/profile/setting/password', [AdminProfileController::class, 'profileSettingsPasswordIndex'])->name('admin.profile.settings.password.index');
    Route::post('/profile/setting/password/save', [AdminProfileController::class, 'profileSettingsPasswordSave'])->name('admin.profile.settings.password.save');

    Route::get('/profile/setting', [AdminProfileController::class, 'profileSettingIndex'])->name('admin.profile.setting.index');
    Route::post('/profil/esetting/save', [AdminProfileController::class, 'profileSettingSave'])->name('admin.profile.setting.save');
    // profile setting Modlue end

    // contact us msg Modlue start
    Route::get('/contact/messages', [AdminContactController::class, 'index'])->name('admin.contact.messages.index');
    Route::get('/contact/messages/view/{id}', [AdminContactController::class, 'view'])->name('admin.contact.messages.view');
    Route::post('/contact/messages/delete/{id}', [AdminContactController::class, 'delete'])->name('admin.contact.messages.delete');
    // contact us msg Modlue end

    // contact settings Modlue start
    Route::get('/contact/settings', [AdminContactController::class, 'indexContactSettings'])->name('admin.contact.settings.index');
    Route::post('/contact/settings/save', [AdminContactController::class, 'saveContactSettings'])->name('admin.contact.settings.save');
    // contact settings Modlue end

    // site settings Modlue start
    Route::get('/site/settings', [AdminSiteSettingController::class, 'index'])->name('admin.site.settings.index');
    Route::post('/site/settings/save', [AdminSiteSettingController::class, 'save'])->name('admin.site.settings.save');
    // site settings Modlue end

    // contact us msg Modlue start
    Route::get('/newsletters', [AdminNewsletterController::class, 'index'])->name('admin.newsletters.index');
    Route::post('/newsletters/delete/{id}', [AdminNewsletterController::class, 'delete'])->name('admin.newsletters.delete');
    Route::post('/newsletters/status/toggle', [AdminNewsletterController::class, 'statusToggle'])->name('admin.newsletters.status.toggle');
    // contact us msg Modlue end

    // newslettermails Modlue start
    Route::any('/newslettermails', [AdminNewsletterMailController::class, 'index'])->name('admin.newslettermails.index');
    Route::get('/newslettermails/create', [AdminNewsletterMailController::class, 'create'])->name('admin.newslettermails.create');
    Route::post('/newslettermails/save', [AdminNewsletterMailController::class, 'save'])->name('admin.newslettermails.save');
    Route::get('/newslettermails/view/{id}', [AdminNewsletterMailController::class, 'view'])->name('admin.newslettermails.view');
    Route::get('/newslettermails/edit/{id}', [AdminNewsletterMailController::class, 'edit'])->name('admin.newslettermails.edit');
    Route::put('/newslettermails/update', [AdminNewsletterMailController::class, 'update'])->name('admin.newslettermails.update');
    Route::post('/newslettermails/delete/{id}', [AdminNewsletterMailController::class, 'delete'])->name('admin.newslettermails.delete');
    Route::get('/newslettermails/sendmail/{id}', [AdminNewsletterMailController::class, 'sendmail'])->name('admin.newslettermails.sendmail');
    // newslettermails Modlue end


    // homeslider Modlue start
    Route::any('/homeslider', [AdminHomeSliderController::class, 'index'])->name('admin.homeslider.index');
    Route::get('/homeslider/create', [AdminHomeSliderController::class, 'create'])->name('admin.homeslider.create');
    Route::post('/homeslider/save', [AdminHomeSliderController::class, 'save'])->name('admin.homeslider.save');
    Route::get('/homeslider/view/{id}', [AdminHomeSliderController::class, 'view'])->name('admin.homeslider.view');
    Route::get('/homeslider/edit/{id}', [AdminHomeSliderController::class, 'edit'])->name('admin.homeslider.edit');
    Route::put('/homeslider/update', [AdminHomeSliderController::class, 'update'])->name('admin.homeslider.update');
    Route::post('/homeslider/status/toggle', [AdminHomeSliderController::class, 'statusToggle'])->name('admin.homeslider.status.toggle');
    Route::post('/homeslider/delete/{id}', [AdminHomeSliderController::class, 'delete'])->name('admin.homeslider.delete');
    // homeslider Modlue end

    // category Modlue start
    Route::any('/categorys', [AdminCategoryController::class, 'index'])->name('admin.categorys.index');
    Route::get('/categorys/create', [AdminCategoryController::class, 'create'])->name('admin.categorys.create');
    Route::post('/categorys/save', [AdminCategoryController::class, 'save'])->name('admin.categorys.save');
    Route::get('/categorys/view/{id}', [AdminCategoryController::class, 'view'])->name('admin.categorys.view');
    Route::get('/categorys/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categorys.edit');
    Route::put('/categorys/update', [AdminCategoryController::class, 'update'])->name('admin.categorys.update');
    Route::post('/categorys/status/toggle', [AdminCategoryController::class, 'statusToggle'])->name('admin.categorys.status.toggle');
    Route::post('/categorys/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.categorys.delete');
    // category Modlue end

     // subcategorys Modlue start
     Route::any('/subcategorys', [AdminSubcategoryController::class, 'index'])->name('admin.subcategorys.index');
     Route::get('/subcategorys/create', [AdminSubcategoryController::class, 'create'])->name('admin.subcategorys.create');
     Route::post('/subcategorys/save', [AdminSubcategoryController::class, 'save'])->name('admin.subcategorys.save');
     Route::get('/subcategorys/view/{id}', [AdminSubcategoryController::class, 'view'])->name('admin.subcategorys.view');
     Route::get('/subcategorys/edit/{id}', [AdminSubcategoryController::class, 'edit'])->name('admin.subcategorys.edit');
     Route::put('/subcategorys/update', [AdminSubcategoryController::class, 'update'])->name('admin.subcategorys.update');
     Route::post('/subcategorys/status/toggle', [AdminSubcategoryController::class, 'statusToggle'])->name('admin.subcategorys.status.toggle');
     Route::post('/subcategorys/delete/{id}', [AdminSubcategoryController::class, 'delete'])->name('admin.subcategorys.delete');
     Route::post('/subcategorys/delete-subcat', [AdminSubcategoryController::class, 'deleteSubcat'])->name('admin.subcategorys.delete.subcat');
     // subcategorys Modlue end

       // subsubcategorys Modlue start
    Route::any('/subsubcategorys', [AdminSubSubCategoryController::class, 'index'])->name('admin.subsubcategorys.index');
    Route::get('/subsubcategorys/create', [AdminSubSubCategoryController::class, 'create'])->name('admin.subsubcategorys.create');
    Route::post('/subsubcategorys/save', [AdminSubSubCategoryController::class, 'save'])->name('admin.subsubcategorys.save');
    Route::get('/subsubcategorys/view/{id}', [AdminSubSubCategoryController::class, 'view'])->name('admin.subsubcategorys.view');
    Route::get('/subsubcategorys/edit/{id}', [AdminSubSubCategoryController::class, 'edit'])->name('admin.subsubcategorys.edit');
    Route::put('/subsubcategorys/update', [AdminSubSubCategoryController::class, 'update'])->name('admin.subsubcategorys.update');
    Route::post('/subsubcategorys/status/toggle', [AdminSubSubCategoryController::class, 'statusToggle'])->name('admin.subsubcategorys.status.toggle');
    Route::post('/subsubcategorys/delete/{id}', [AdminSubSubCategoryController::class, 'delete'])->name('admin.subsubcategorys.delete');
    Route::post('/subsubcategorys/getsub', [AdminSubSubCategoryController::class, 'getSubcategories'])->name('admin.subsubcategorys.get.subcat');

    // subsubcategorys Modlue end


     // sisterscompanylogo Modlue start
     Route::any('/sisterscompanylogo', [AdminLogoController::class, 'index'])->name('admin.sisterscompanylogo.index');
     Route::get('/sisterscompanylogo/create', [AdminLogoController::class, 'create'])->name('admin.sisterscompanylogo.create');
     Route::post('/sisterscompanylogo/save', [AdminLogoController::class, 'save'])->name('admin.sisterscompanylogo.save');
     Route::get('/sisterscompanylogo/view/{id}', [AdminLogoController::class, 'view'])->name('admin.sisterscompanylogo.view');
     Route::get('/sisterscompanylogo/edit/{id}', [AdminLogoController::class, 'edit'])->name('admin.sisterscompanylogo.edit');
     Route::put('/sisterscompanylogo/update', [AdminLogoController::class, 'update'])->name('admin.sisterscompanylogo.update');
     Route::post('/sisterscompanylogo/status/toggle', [AdminLogoController::class, 'statusToggle'])->name('admin.sisterscompanylogo.status.toggle');
     Route::post('/sisterscompanylogo/delete/{id}', [AdminLogoController::class, 'delete'])->name('admin.sisterscompanylogo.delete');
     // sisterscompanylogo Modlue end

     // services Modlue start
     Route::any('/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
     Route::get('/services/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
     Route::post('/services/save', [AdminServiceController::class, 'save'])->name('admin.services.save');
     Route::get('/services/view/{id}', [AdminServiceController::class, 'view'])->name('admin.services.view');
     Route::get('/services/edit/{id}', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
     Route::put('/services/update', [AdminServiceController::class, 'update'])->name('admin.services.update');
     Route::post('/services/status/toggle', [AdminServiceController::class, 'statusToggle'])->name('admin.services.status.toggle');
     Route::post('/services/delete/{id}', [AdminServiceController::class, 'delete'])->name('admin.services.delete');
     Route::post('/services/delete-subcat', [AdminServiceController::class, 'deleteSubcat'])->name('admin.services.delete.subcat');
     // services Modlue end

       // director Modlue start
    Route::any('/director', [AdminDirectorController::class, 'index'])->name('admin.director.index');
    Route::get('/director/create', [AdminDirectorController::class, 'create'])->name('admin.director.create');
    Route::post('/director/save', [AdminDirectorController::class, 'save'])->name('admin.director.save');
    Route::get('/director/view/{id}', [AdminDirectorController::class, 'view'])->name('admin.director.view');
    Route::get('/director/edit/{id}', [AdminDirectorController::class, 'edit'])->name('admin.director.edit');
    Route::put('/director/update', [AdminDirectorController::class, 'update'])->name('admin.director.update');
    Route::post('/director/status/toggle', [AdminDirectorController::class, 'statusToggle'])->name('admin.director.status.toggle');
    Route::post('/director/delete/{id}', [AdminDirectorController::class, 'delete'])->name('admin.director.delete');
    // director Modlue end
});
// Admin route end

Route::group(['namespace' => 'Front'], function () {

    Route::get('/', [FrontPagesController::class, 'home'])->name('front.home');
    Route::get('/about', [FrontPagesController::class, 'about'])->name('front.about');
    Route::get('/services', [FrontPagesController::class, 'services'])->name('front.services');


    Route::get('/product/category/{id}', [FrontPagesController::class, 'productCategory'])->name('admin.product.category');
    Route::get('/product/subcategory/{id}', [FrontPagesController::class, 'productSubCategory'])->name('admin.product.subcategory');

    Route::get('/contact', [FrontContactController::class, 'contact'])->name('front.contact');
    Route::post('/contact/message/save', [FrontContactController::class, 'contactMessageSave'])->name('front.contact.message.save');

    Route::post('/newsletter/save', [FrontPagesController::class, 'newsletterSave'])->name('front.newsletter.save');
    Route::get('/newsletter/unsubscribe/{email}', [FrontPagesController::class, 'newsletterUnSubscribe'])->name('front.newsletter.unsubscribe');

    Route::get('/privacy_policy', [FrontPagesController::class, 'privacy_policy'])->name('front.privacy_policy');
    Route::get('/term_and_condition', [FrontPagesController::class, 'term_and_condition'])->name('front.term_and_condition');
});
