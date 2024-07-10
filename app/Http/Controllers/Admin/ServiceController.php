<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HandleResponseTrait;
use App\SaveImageTrait;
use App\DeleteImageTrait;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use HandleResponseTrait, SaveImageTrait, DeleteImageTrait;

    public function index() {
        return view('Admin.services.index');
    }

    public function get() {
        $services = Service::all();

        return $this->handleResponse(
            true,
            "",
            [],
            [
                $services
            ],
            []
        );
    }

    public function add() {
        return view("Admin.services.create");
    }

    public function edit($id) {
        $service = Service::find($id);

        if ($service)
            return view("Admin.services.edit")->with(compact("service"));

        return $this->handleResponse(
            false,
            "Service not exists",
            ["Service id not valid"],
            [],
            []
        );
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            "title" => ["required", "max:100"],
            "description" => ["required"],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            "title.required" => "ادخل عنوان الخدمة",
            "title.max" => "يجب الا يتعدى عنوان الخدمة 100 حرف",
            "sub_title.required" => "ادخل عنوان ثانوي للخدمة",
            "photo.required" => "صورة الخدمة مطلوبة",
            "photo.image" => "من فضلك ارفع صورة صالحة",
            "photo.mimes" => "يجب ان تكون الصورة بين هذه الصيغ (jpeg, png, jpg, gif)",
            "photo.max" => "يجب الا يتعدى حجم الصورة 2 ميجا",
            "phone.required" => "رقم الهاتف مطلوب",
            "working_from.required" => "وقت بدء العمل مطلوب",
            "working_to.required" => "وقت انتهاء العمل مطلوب",
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

        $photo = $this->saveImg($request->photo, 'images/uploads/Services', time());

        $service = Service::create([
            "title" => $request->title,
            "description" => $request->description,
            "photo_path" => '/images/uploads/Services/' . $photo,
        ]);

        if ($service)
            return $this->handleResponse(
                true,
                "تم اضافة الخدمة بنجاح",
                [],
                [],
                []
            );
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            "id" => ["required"],
            "title" => ["required", "max:100"],
            "description" => ["required"],
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            "title.required" => "ادخل عنوان الخدمة",
            "title.max" => "يجب الا يتعدى عنوان الخدمة 100 حرف",
            "sub_title.required" => "ادخل عنوان ثانوي للخدمة",
            "photo.image" => "من فضلك ارفع صورة صالحة",
            "photo.mimes" => "يجب ان تكون الصورة بين هذه الصيغ (jpeg, png, jpg, gif)",
            "photo.max" => "يجب الا يتعدى حجم الصورة 2 ميجا",
            "phone.required" => "رقم الهاتف مطلوب",
            "working_from.required" => "وقت بدء العمل مطلوب",
            "working_to.required" => "وقت انتهاء العمل مطلوب",
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

        $service = Service::find($request->id);

        if ($request->photo) {
            $this->deleteFile(public_path($service->photo_path));
            $photo = $this->saveImg($request->photo, 'images/uploads/Services', time());
            $service->photo_path = '/images/uploads/Services/' . $photo;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        if ($service)
            return $this->handleResponse(
                true,
                "تم تحديث الخدمة بنجاح",
                [],
                [],
                []
            );
    }

    public function deleteIndex($id) {
        $service = Service::find($id);

        if ($service)
            return view("Admin.services.delete")->with(compact("service"));

        return $this->handleResponse(
            false,
            "Service not exists",
            ["Service id not valid"],
            [],
            []
        );
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            "id" => ["required"],
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

        $service = Service::find($request->id);

        $this->deleteFile(public_path($service->photo_path));

        $service->delete();

        if ($service)
            return $this->handleResponse(
                true,
                "تم حذف الخدمة بنجاح",
                [],
                [],
                []
            );
    }
}
