<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OurOffersController;
use App\Http\Controllers\OurServicesModelController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Route;

Route::get("login",[AdminController::class,"Login"])->name("login");
Route::post("AdminUserLogin",[AdminController::class,"AdminLoginUser"])->name("AdminLogin");
Route::get("getmenu-items",[HomePageController::class,"getMenu"]);
//pages

Route::middleware(['auth'])->group(function () {
    Route::get("/new-dashboard",[AdminController::class,"dashboard"])->name("new-dashboard");
    
    // Route::get("site-navigation",[AdminController::class,"siteNav"])->name("siteNav");
    // Route::post("addEditNavigation",[AdminController::class,"addEditNavigation"])->name("addNaviagtion");
    // Route::post("deleteNavigation",[AdminController::class,"deleteNavigation"])->name("deleteNavigation");
    // Route::post("navDataTable",[AdminController::class,"navDataTable"])->name("navDataTable");

    Route::get("manage-gallery",[AdminController::class,"manageGallery"])->name("manageGallery");
    Route::post("addGalleryItems",[AdminController::class,"addGalleryItems"])->name("addGalleryItems");
    Route::post("addGalleryDataTable",[AdminController::class,"addGalleryDataTable"])->name("addGalleryDataTable");

    Route::get("add-destinations", [DestinationController::class, "destinationMaster"])->name("DestinationsMaster");
    Route::post("save-destinations", [DestinationController::class, "saveDestinations"])->name("saveDestinations");
    Route::post("destinations-data", [DestinationController::class, "destinationsData"])->name("DestinationsData");

    Route::get("our-services-master", [OurServicesModelController::class, "viewOurServicesMaster"])->name("viewOurServicesMaster");
    Route::post("save-our-services", [OurServicesModelController::class, "saveOurServicesMaster"])->name("saveOurServicesMaster");
    Route::post("our-services-data", [OurServicesModelController::class, "ourServicesData"])->name("ourServicesData");

    Route::get("testimonials-master", [TestimonialsController::class, "viewTestimonialsMaster"])->name("viewTestimonials");
    Route::post("save-testimonials", [TestimonialsController::class, "saveTestimonialsMaster"])->name("saveTestimonialsMaster");
    Route::post("testimonials-data", [TestimonialsController::class, "testimonialsData"])->name("testimonialsData");
    Route::get("get-testimonial-row-data", [TestimonialsController::class, "getTestimonialRowData"])->name("getTestimonialRowData");
    
    Route::get("mange-contact-us",[ContactUsController::class,"manageContactUs"])->name("manageContactUs");
    Route::post("contact-us-data",[ContactUsController::class,"contactUsData"])->name("ContactUsData");

    Route::get("manage-offers",[OurOffersController::class,"index"])->name("manage-offers.index");
    Route::post("save-offers",[OurOffersController::class,"store"])->name("manage-offers.store");
    Route::post("manage-offers-data",[OurOffersController::class,"manageOffersData"])->name("manageOffersData");
});