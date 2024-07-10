<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\User\ContactController;
use App\Http\Middleware\GuestAdminMiddleware;

Route::prefix('admin')->group(function () {
    Route::post("login", [AuthController::class, "login"])->middleware([GuestAdminMiddleware::class])->name("admin.login.post");
    Route::get("login", [AuthController::class, "index"])->middleware([GuestAdminMiddleware::class])->name("login");

    Route::middleware(['auth:admin'])->group(function () {
        // Dashboard
        Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");

        // Sponsor
        Route::prefix('sponsors')->group(function () {
            Route::get("/", [SponsorController::class, "index"])->name("admin.sponsors.show");
            Route::get("/get", [SponsorController::class, "get"])->name("admin.sponsors.get");
            Route::get("/create", [SponsorController::class, "add"])->name("admin.sponsors.add");
            Route::post("/create", [SponsorController::class, "create"])->name("admin.sponsors.create");
            Route::get("/edit/{id}", [SponsorController::class, "edit"])->name("admin.sponsors.edit");
            Route::get("/toggleTop/{id}", [SponsorController::class, "toggleTop"])->name("admin.sponsors.toggleTop");
            Route::post("/update", [SponsorController::class, "update"])->name("admin.sponsors.update");
            Route::get("/delete/{id}", [SponsorController::class, "deleteIndex"])->name("admin.sponsors.delete.confirm");
            Route::post("/delete", [SponsorController::class, "delete"])->name("admin.sponsors.delete");
        });

        // Services
        Route::prefix('services')->group(function () {
            Route::get("/", [ServiceController::class, "index"])->name("admin.services.show");
            Route::get("/get", [ServiceController::class, "get"])->name("admin.services.get");
            Route::get("/create", [ServiceController::class, "add"])->name("admin.services.add");
            Route::post("/create", [ServiceController::class, "create"])->name("admin.services.create");
            Route::get("/edit/{id}", [ServiceController::class, "edit"])->name("admin.services.edit");
            Route::post("/update", [ServiceController::class, "update"])->name("admin.services.update");
            Route::get("/delete/{id}", [ServiceController::class, "deleteIndex"])->name("admin.services.delete.confirm");
            Route::post("/delete", [ServiceController::class, "delete"])->name("admin.services.delete");
        });

        // Works
        Route::prefix('works')->group(function () {
            Route::get("/", [WorkController::class, "index"])->name("admin.works.show");
            Route::get("/get", [WorkController::class, "get"])->name("admin.works.get");
            Route::get("/create", [WorkController::class, "add"])->name("admin.works.add");
            Route::post("/create", [WorkController::class, "create"])->name("admin.works.create");
            Route::get("/edit/{id}", [WorkController::class, "edit"])->name("admin.works.edit");
            Route::post("/update", [WorkController::class, "update"])->name("admin.works.update");
            Route::get("/delete/{id}", [WorkController::class, "deleteIndex"])->name("admin.works.delete.confirm");
            Route::post("/delete", [WorkController::class, "delete"])->name("admin.works.delete");
        });

        Route::get("/messages", function() {
            return view("Admin.messages.index");
        })->name("admin.emails");

        Route::post('/store-settings', [SettingsController::class, "store"]);
    });
});
