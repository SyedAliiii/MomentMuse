<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/contactSend', [HomeController::class, 'contactSend'])->name('contactSend');
Route::get('/quotations/{id}', [HomeController::class, 'quotations'])->name('quotations');
Route::post('/quotations', [HomeController::class, 'quotationSend'])->name('quotationSend');



Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('login/submit', [AuthController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['admin.auth'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('blogs', [AdminController::class, 'blogs'])->name('admin.blogs');
        Route::get('edit/{id}', [AdminController::class, 'contentEdit'])->name('admin.edit');
        Route::post('edit/{id}', [AdminController::class, 'blogUpdate'])->name('admin.blogUpdate');
        
        Route::post('/blogsCreate', [AdminController::class, 'blogsCreate'])->name('blogsCreate');
        Route::delete('/blogs/{blog}', [AdminController::class, 'deleteBlog'])->name('blogs.delete');

        Route::post('/admin/testimonial/update/{id}', [AdminController::class, 'testimonialUpdate'])->name('admin.testimonialUpdate');
        Route::post('testimonialCreate', [AdminController::class, 'testimonialCreate'])->name('admin.testimonialCreate');
        Route::get('editTestimonial/{id}', [AdminController::class, 'editTestimonial'])->name('admin.editTestimonial');
        Route::delete('/testimonial/{testimonial}', [AdminController::class, 'deleteTestimonial'])->name('testimonial.delete');
        
        Route::get('portfolios', [AdminController::class, 'portfolios'])->name('admin.portfolios');
        Route::post('portfoliosCreate', [AdminController::class, 'portfoliosCreate'])->name('admin.portfoliosCreate');
        Route::get('editPortfolios/{id}', [AdminController::class, 'editPortfolios'])->name('admin.editPortfolios');
        Route::post('update/{id}', [AdminController::class, 'portfoliosUpdate'])->name('admin.portfoliosUpdate');
        Route::delete('/portfolios/{portfolio}', [AdminController::class, 'deletePortfolios'])->name('portfolios.delete');
        
        Route::get('contacts', [AdminController::class, 'contacts'])->name('admin.contacts');
        
        Route::get('items', [AdminController::class, 'items'])->name('admin.items');
        Route::post('itemsCreate', [AdminController::class, 'itemsCreate'])->name('admin.itemsCreate');
        Route::delete('/items/{items}', [AdminController::class, 'deleteItems'])->name('items.delete');
        
        
        Route::get('services', [AdminController::class, 'services'])->name('admin.services');
        Route::post('servicesCreate', [AdminController::class, 'servicesCreate'])->name('admin.servicesCreate');
        Route::get('serviceEdit/{id}', [AdminController::class, 'serviceEdit'])->name('admin.serviceEdit');
        Route::delete('/services/{id}', [AdminController::class, 'deleteServices'])->name('service.delete');
        


        Route::get('quotations', [AdminController::class, 'quotations'])->name('admin.quotations');

        

    });

});