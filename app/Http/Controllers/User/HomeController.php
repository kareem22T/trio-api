<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\HandleResponseTrait;
use App\Models\Setting;

class HomeController extends Controller
{
    use HandleResponseTrait;
    public function get() {
        $settings = Setting::all();

        // Transform settings into an associative array.
        $settingsArray = $settings->mapWithKeys(function ($setting) {
            return [
                $setting->key => [
                    'value' => $setting->value,
                ]
            ];
        })->toArray();

        return response()->json([$settingsArray]);
    }
}
