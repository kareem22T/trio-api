<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HandleResponseTrait;
use App\SaveImageTrait;
use App\DeleteImageTrait;
use App\Models\Work;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    use HandleResponseTrait, SaveImageTrait, DeleteImageTrait;

    public function index() {
        return view('Admin.works.index');
    }

    public function get() {
        $works = Work::all();

        return $this->handleResponse(
            true,
            "",
            [],
            [
                $works
            ],
            []
        );
    }

    public function add() {
        return view("Admin.works.create");
    }

    public function edit($id) {
        $work = Work::find($id);

        if ($work)
            return view("Admin.works.edit")->with(compact("work"));

        return $this->handleResponse(
            false,
            "Work not exists",
            ["Work id not valid"],
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

        $photo = $this->saveImg($request->photo, 'images/uploads/Works', time());

        $work = Work::create([
            "title" => $request->title,
            "description" => $request->description,
            "photo_path" => '/images/uploads/Works/' . $photo,
        ]);

        if ($work)
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

        $work = Work::find($request->id);

        if ($request->photo) {
            $this->deleteFile(public_path($work->photo_path));
            $photo = $this->saveImg($request->photo, 'images/uploads/Works', time());
            $work->photo_path = '/images/uploads/Works/' . $photo;
        }

        $work->title = $request->title;
        $work->description = $request->description;
        $work->save();

        if ($work)
            return $this->handleResponse(
                true,
                "تم تحديث الخدمة بنجاح",
                [],
                [],
                []
            );
    }

    public function deleteIndex($id) {
        $work = Work::find($id);

        if ($work)
            return view("Admin.works.delete")->with(compact("work"));

        return $this->handleResponse(
            false,
            "Work not exists",
            ["Work id not valid"],
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

        $work = Work::find($request->id);

        $this->deleteFile(public_path($work->photo_path));

        $work->delete();

        if ($work)
            return $this->handleResponse(
                true,
                "تم حذف الخدمة بنجاح",
                [],
                [],
                []
            );
    }
}
