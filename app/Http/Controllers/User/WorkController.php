<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HandleResponseTrait;
use App\Models\Work;
use App\Models\Event;

class WorkController extends Controller
{
    use HandleResponseTrait;

    public function get() {
        $works = Work::latest()->paginate(1);

        return $this->handleResponse(
            true,
            "عملية ناجحة",
            [],

                $works
            ,
            [
                "يبدا مسار الصورة من بعد الدومين مباشرا"
            ]
        );
    }
}
