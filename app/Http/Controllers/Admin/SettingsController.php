<?php

namespace App\Http\Controllers\Admin;

use App\DeleteImageTrait;
use App\HandleResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\SaveImageTrait;

class SettingsController extends Controller
{
    use HandleResponseTrait, SaveImageTrait, DeleteImageTrait;

    public function store(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($request->hasFile($key)) {
                $image = $this->saveImg($value, 'images/uploads/Settings', time());
                $path = '/images/uploads/Settings/' . $image;
                Setting::updateOrCreate(['key' => $key], ['value' => $path]);
            } else {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return redirect()->to('/admin/dashboard')
        ->with('success', 'Settings setted successfuly');
    }

}
