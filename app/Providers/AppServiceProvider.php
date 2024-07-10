<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register any application services here.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Check if the environment is production and force HTTPS if true.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Check if the settings table exists.
        if (Schema::hasTable('settings')) {
            // Fetch all settings from the database.
            $settings = Setting::all();

            // Transform settings into an associative array.
            $settingsArray = $settings->mapWithKeys(function ($setting) {
                return [
                    $setting->key => [
                        'value' => $setting->value,
                    ]
                ];
            })->toArray();

            // Share the settings array with all views.
            view()->share('settingsArray', $settingsArray);
        }
    }
}
