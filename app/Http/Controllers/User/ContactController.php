<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HandleResponseTrait;
use App\SaveImageTrait;
use App\DeleteImageTrait;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use HandleResponseTrait, SaveImageTrait, DeleteImageTrait;

    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            "email" => ["required", "email"],
            "phone" => ["required"],
            "address" => ["required"],
            "name" => ["required"],
            "service" => ["required"],
            "message" => ["required"],
        ]);

        if ($validator->fails()) {
            return $this->handleResponse(
                false,
                "",
                [$validator->errors()->first()],
                [],
                []
            );
        }

        $email = Message::create($request->toArray());

        if ($email)
            return $this->handleResponse(
                true,
                "تم التسجيل بنجاح",
                [],
                [],
                []
            );
    }
}
