<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HandleResponseTrait;
use App\Models\Service;
use App\Models\Event;

class ServiceController extends Controller
{
    use HandleResponseTrait;

    public function get() {
        $services = Service::latest()->paginate(20);

        return $this->handleResponse(
            true,
            "عملية ناجحة",
            [],

                $services
            ,
            [
                "يبدا مسار الصورة من بعد الدومين مباشرا"
            ]
        );
    }
}
