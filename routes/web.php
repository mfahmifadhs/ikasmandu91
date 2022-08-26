<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [MainController::class, 'index']);

// Authentication
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


// =============
// Admin Master
// =============
Route::group(['middleware' => ['role:admin-master','status:aktif'], 'prefix' => 'admin-master', 'as' => 'admin-master.'], function () {
    Route::get('dashboard', [MasterController::class, 'index']);
    Route::get('mainmenu', [MasterController::class, 'showMainmenu']);
    Route::get('archive/{id}', [MasterController::class, 'showArchive']);
    Route::get('rules', [MasterController::class, 'showRules']);
    Route::get('alumni', [MasterController::class, 'showAlumni']);
    Route::get('admin', [MasterController::class, 'showAdmin']);
    Route::get('detail-mainmenu/{id}', [MasterController::class, 'detailMainmenu']);
    Route::get('create-rules', [MasterController::class, 'createRules']);
    Route::get('create-admin', [MasterController::class, 'createAdmin']);
    Route::get('create-content1/{id}', [MasterController::class, 'createContent1']);
    Route::get('create-content2/{id}', [MasterController::class, 'createContent2']);
    Route::get('edit-rules/{id}', [MasterController::class, 'editRules']);
    Route::get('edit-news/{id}', [MasterController::class, 'editNews']);
    Route::get('edit-history/{id}', [MasterController::class, 'editHistory']);
    Route::get('edit-committee/{id}', [MasterController::class, 'editCommittee']);
    Route::get('restore-news/{id}', [MasterController::class, 'restoreNews']);
    Route::get('restore-committee/{id}', [MasterController::class, 'restoreCommittee']);

    Route::post('post-rules', [MasterController::class, 'postRules']);
    Route::post('post-admin', [MasterController::class, 'postAdmin']);
    Route::post('post-category', [MasterController::class, 'postCategory']);
    Route::post('post-history', [MasterController::class, 'postHistory']);
    Route::post('post-news', [MasterController::class, 'postNews']);
    Route::post('post-opening', [MasterController::class, 'postOpening']);
    Route::post('post-school', [MasterController::class, 'postSchool']);
    Route::post('post-organization-structure', [MasterController::class, 'postOrganizationStructure']);
    Route::post('post-committee', [MasterController::class, 'postCommittee']);
    Route::post('update-mainmenu/{id}', [MasterController::class, 'updateMainmenu']);
    Route::post('update-submenu/{id}', [MasterController::class, 'updateSubmenu']);
    Route::post('update-rules/{id}', [MasterController::class, 'updateRules']);
    Route::post('update-news/{id}', [MasterController::class, 'updateNews']);
    Route::post('update-committee/{id}', [MasterController::class, 'updateCommittee']);
    Route::post('delete-news/{id}', [MasterController::class, 'deleteNews']);
    Route::post('delete-committee/{id}', [MasterController::class, 'deleteCommittee']);
    Route::post('select2-alumni', [MasterController::class, 'select2Alumni']);
    Route::post('select2-committee', [MasterController::class, 'select2Committee']);

    Route::get('get-alumni', [MasterController::class, 'getAlumni']);

});

// =============
// Admin User
// =============
Route::group(['middleware' => ['role:admin-user','status:aktif'], 'prefix' => 'admin-user', 'as' => 'admin-user.'], function () {
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::get('menu/{id}', [AdminController::class, 'showMenu']);
    Route::get('berita/{aksi}/{id}', [AdminController::class, 'showNews']);
    Route::get('kata-sambutan/{aksi}/{id}', [AdminController::class, 'showOpening']);
    Route::get('alumni/{aksi}/{id}', [AdminController::class, 'showAlumni']);
    Route::get('sekolah/{aksi}/{id}', [AdminController::class, 'showSchool']);
    Route::get('organisasi/{aksi}/{id}', [AdminController::class, 'showOrganization']);
    Route::get('galeri/{aksi}/{id}', [AdminController::class, 'showGallery']);

    Route::post('galeri/{aksi}/{id}', [AdminController::class, 'showGallery']);
    Route::post('organisasi/{aksi}/{id}', [AdminController::class, 'showOrganization']);
    Route::post('sekolah/{aksi}/{id}', [AdminController::class, 'showSchool']);
    Route::post('alumni/{aksi}/{id}', [AdminController::class, 'showAlumni']);
    Route::post('berita/{aksi}/{id}', [AdminController::class, 'showNews']);
    Route::post('delete-news/{id}', [AdminController::class, 'deleteNews']);
    Route::post('delete-gallery/{id}', [AdminController::class, 'deleteGallery']);
    Route::post('delete-committee/{id}', [AdminController::class, 'deleteCommittee']);

});

// =============
// Admin User
// =============
Route::group(['prefix' => 'main', 'as' => 'main.'], function () {
    Route::get('dashboard', [MainController::class, 'index']);
    Route::get('menu/{id}', [MainController::class, 'showMenu']);
    Route::get('profil/{id}', [MainController::class, 'showProfile']);
    Route::get('alumni/{aksi}/{id}', [MainController::class, 'showAlumni']);
    Route::get('sekolah/{aksi}/{id}', [MainController::class, 'showSchool']);
    Route::get('berita/{aksi}/{id}', [MainController::class, 'showNews']);
    Route::get('organisasi/{aksi}/{id}', [MainController::class, 'showOrganization']);
    Route::get('galeri/{aksi}/{id}', [MainController::class, 'showGallery']);


    Route::post('alumni/{aksi}/{id}', [MainController::class, 'showAlumni']);
    Route::post('berita/{aksi}/{id}', [MainController::class, 'showNews']);
    Route::post('alumni/{aksi}/{id}', [MainController::class, 'showAlumni']);
    Route::post('select2-alumni', [MainController::class, 'select2Alumni']);

});
