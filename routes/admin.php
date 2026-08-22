<?php

use App\Http\Controllers\Admin\AboutPillController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\AboutStatController;
use App\Http\Controllers\Admin\CatalogItemController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroStatController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NavbarSettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Models\Permission;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

        // ── Dashboard ─────────────────────────────────────────────────
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        // ── Admin profile ─────────────────────────────────────────────
        Route::get('/admin/edit/{id}',    [LoginController::class, 'editlogin'])->name('admin.login.edit');
        Route::post('/admin/update/{id}', [LoginController::class, 'updatelogin'])->name('admin.login.update');

        // ── Roles & Employees ─────────────────────────────────────────
        Route::resource('employee', EmployeeController::class, ['as' => 'admin'])->except(['show']);
        Route::get('role',               [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('role/create',        [RoleController::class, 'create'])->name('admin.role.create');
        Route::get('role/{id}/edit',     [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::patch('role/{id}',        [RoleController::class, 'update'])->name('admin.role.update');
        Route::post('role',              [RoleController::class, 'store'])->name('admin.role.store');
        Route::post('admin/role/delete',  [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::delete('role/{id}',        [RoleController::class, 'destroy'])->name('admin.role.destroy');

        Route::get('/permissions/{guard_name}', function ($guard_name) {
            return response()->json(Permission::where('guard_name', $guard_name)->get());
        });

        // ── Front site content: navbar / footer / contact info ─────────
        Route::get('navbar',  [NavbarSettingController::class, 'edit'])->name('admin.navbar.edit');
        Route::put('navbar',  [NavbarSettingController::class, 'update'])->name('admin.navbar.update');
        Route::get('footer',  [FooterSettingController::class, 'edit'])->name('admin.footer.edit');
        Route::put('footer',  [FooterSettingController::class, 'update'])->name('admin.footer.update');
        Route::get('contact-info', [ContactInfoController::class, 'edit'])->name('admin.contact-info.edit');
        Route::put('contact-info', [ContactInfoController::class, 'update'])->name('admin.contact-info.update');

        // ── Front site content: home page sections ──────────────────────
        Route::get('hero', [HeroController::class, 'edit'])->name('admin.hero.edit');
        Route::put('hero', [HeroController::class, 'update'])->name('admin.hero.update');
        Route::resource('hero-stats', HeroStatController::class, ['as' => 'admin'])->except(['show']);

        Route::get('about', [AboutSectionController::class, 'edit'])->name('admin.about.edit');
        Route::put('about', [AboutSectionController::class, 'update'])->name('admin.about.update');
        Route::resource('about-pills', AboutPillController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('about-stats', AboutStatController::class, ['as' => 'admin'])->except(['show']);

        Route::resource('services',      ServiceController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('products',      ProductController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('catalog-items', CatalogItemController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('projects',      ProjectController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('clients',       ClientController::class, ['as' => 'admin'])->except(['show']);
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login',  [LoginController::class, 'show_login_view'])->name('admin.showlogin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});
