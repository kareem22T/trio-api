@extends("Admin.layouts.main")
@section("title", "Settings")
@section("content")
    <h1 class="h3 mb-0 text-gray-800">Settings</h1>
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <form action="/admin/store-settings" enctype="multipart/form-data" method="POST" class="card p-4">
        @csrf
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Hero</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">About us</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-media-tab" data-bs-toggle="pill" data-bs-target="#pills-media" type="button" role="tab" aria-controls="pills-media" aria-selected="false">Media</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form-group">
                    <label for="">Hero Title</label>
                    <input type="text" name="hero_title" id="hero_title" class="form-control" placeholder="Hero Title" value="{{(isset($settingsArray["hero_title"]) && $settingsArray["hero_title"]["value"]) ? $settingsArray["hero_title"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Hero Sub Title</label>
                    <input type="text" name="hero_sub_title" id="hero_sub_title" class="form-control" placeholder="Hero Sub Title" value="{{(isset($settingsArray["hero_sub_title"]) && $settingsArray["hero_sub_title"]["value"]) ? $settingsArray["hero_sub_title"]["value"] : ''}}">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Establishment Span</label>
                    <input type="text" name="establishment_span" id="establishment_span" class="form-control" placeholder="Establishment Span" value="{{(isset($settingsArray["establishment_span"]) && $settingsArray["establishment_span"]["value"]) ? $settingsArray["establishment_span"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Establishment Title</label>
                    <input type="text" name="establishment_title" id="establishment_title" class="form-control" placeholder="Establishment Title" value="{{(isset($settingsArray["establishment_title"]) && $settingsArray["establishment_title"]["value"]) ? $settingsArray["establishment_title"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Establishment Description</label>
                    <input type="text" name="establishment_description" id="establishment_description" class="form-control" placeholder="Establishment Description" value="{{(isset($settingsArray["establishment_description"]) && $settingsArray["establishment_description"]["value"]) ? $settingsArray["establishment_description"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Establishment Date</label>
                    <input type="text" name="establishment_date" id="establishment_date" class="form-control" placeholder="Establishment Date" value="{{(isset($settingsArray["establishment_date"]) && $settingsArray["establishment_date"]["value"]) ? $settingsArray["establishment_date"]["value"] : ''}}">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Preview Title</label>
                    <input type="text" name="preview_title" id="preview_title" class="form-control" placeholder="Preview Title" value="{{(isset($settingsArray["preview_title"]) && $settingsArray["preview_title"]["value"]) ? $settingsArray["preview_title"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Preview Title2</label>
                    <input type="text" name="preview_title2" id="preview_title2" class="form-control" placeholder="Preview Title2" value="{{(isset($settingsArray["preview_title2"]) && $settingsArray["preview_title2"]["value"]) ? $settingsArray["preview_title2"]["value"] : ''}}">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Sponsor Description</label>
                    <input type="text" name="sponsor_description" id="sponsor_description" class="form-control" placeholder="Sponsor Description" value="{{(isset($settingsArray["sponsor_description"]) && $settingsArray["sponsor_description"]["value"]) ? $settingsArray["sponsor_description"]["value"] : ''}}">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Footer Description</label>
                    <input type="text" name="footer_description" id="footer_description" class="form-control" placeholder="Footer Description" value="{{(isset($settingsArray["footer_description"]) && $settingsArray["footer_description"]["value"]) ? $settingsArray["footer_description"]["value"] : ''}}">
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="form-group">
                    <label for="">X Url</label>
                    <input type="url" name="x_url" id="x_url" class="form-control" placeholder="X Url" value="{{(isset($settingsArray["x_url"]) && $settingsArray["x_url"]["value"]) ? $settingsArray["x_url"]["value"] : ''}}">
                </div>

                <div class="form-group">
                    <label for="">Tiktok Url</label>
                    <input type="url" name="tiktok_url" id="tiktok_url" class="form-control" placeholder="Tiktok Url" value="{{(isset($settingsArray["tiktok_url"]) && $settingsArray["tiktok_url"]["value"]) ? $settingsArray["tiktok_url"]["value"] : ''}}">
                </div>

                <div class="form-group">
                    <label for="">Instagram Url</label>
                    <input type="url" name="instagram_url" id="instagram_url" class="form-control" placeholder="Instagram Url" value="{{(isset($settingsArray["instagram_url"]) && $settingsArray["instagram_url"]["value"]) ? $settingsArray["instagram_url"]["value"] : ''}}">
                </div>

                <div class="form-group">
                    <label for="">Whatsapp Url</label>
                    <input type="url" name="whatsapp_url" id="whatsapp_url" class="form-control" placeholder="Whatsapp Url" value="{{(isset($settingsArray["whatsapp_url"]) && $settingsArray["whatsapp_url"]["value"]) ? $settingsArray["whatsapp_url"]["value"] : ''}}">
                </div>

                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{(isset($settingsArray["phone"]) && $settingsArray["phone"]["value"]) ? $settingsArray["phone"]["value"] : ''}}">
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{(isset($settingsArray["address"]) && $settingsArray["address"]["value"]) ? $settingsArray["address"]["value"] : ''}}">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{(isset($settingsArray["email"]) && $settingsArray["email"]["value"]) ? $settingsArray["email"]["value"] : ''}}">
                </div>

            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="form-group">
                    <label for="">Who is trio?</label>
                    <input type="text" name="who_trio" id="who_trio" class="form-control" placeholder="Who is trio?" value="{{(isset($settingsArray["who_trio"]) && $settingsArray["who_trio"]["value"]) ? $settingsArray["who_trio"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Our principle card 1</label>
                    <input type="text" name="our_principle_1" id="our_principle_1" class="form-control" placeholder="Our principle card 1" value="{{(isset($settingsArray["our_principle_1"]) && $settingsArray["our_principle_1"]["value"]) ? $settingsArray["our_principle_1"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Our principle card 2</label>
                    <input type="text" name="our_principle_2" id="our_principle_2" class="form-control" placeholder="Our principle card 2" value="{{(isset($settingsArray["our_principle_2"]) && $settingsArray["our_principle_2"]["value"]) ? $settingsArray["our_principle_2"]["value"] : ''}}">
                </div>
                <div class="form-group">
                    <label for="">Our principle card 3</label>
                    <input type="text" name="our_principle_3" id="our_principle_3" class="form-control" placeholder="Our principle card 3" value="{{(isset($settingsArray["our_principle_3"]) && $settingsArray["our_principle_3"]["value"]) ? $settingsArray["our_principle_3"]["value"] : ''}}">
                </div>
            </div>
            <div class="tab-pane fade" id="pills-media" role="tabpanel" aria-labelledby="pills-media-tab">
                <div class="form-group">
                    <label for="">Hero img</label>
                    <input type="file" name="hero_img" id="hero_img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Third section background</label>
                    <input type="file" name="third_bg" id="third_bg" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Third section about us</label>
                    <input type="file" name="third_bg_about" id="third_bg_about" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Third section services</label>
                    <input type="file" name="third_bg_services" id="third_bg_services" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Third section our work</label>
                    <input type="file" name="third_bg_work" id="third_bg_work" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">footer</label>
                    <input type="file" name="footer" id="footer" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Profile download</label>
                    <input type="file" name="profile_pdf" id="profile_pdf" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Portfolio download</label>
                    <input type="file" name="portfolio_pdf" id="portfolio_pdf" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Our services page head</label>
                    <input type="file" name="our_services" id="our_services" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Our work page head</label>
                    <input type="file" name="our_work" id="our_work" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">About us head</label>
                    <input type="file" name="about_us" id="about_us" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">About us main image</label>
                    <input type="file" name="about_us_main" id="about_us_main" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Testemonial large image</label>
                    <input type="file" name="about_us_large" id="about_us_large" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Testemonial first image</label>
                    <input type="file" name="about_us_first" id="about_us_first" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Testemonial second image</label>
                    <input type="file" name="about_us_second" id="about_us_second" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Testemonial bg</label>
                    <input type="file" name="about_us_bg" id="about_us_bg" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Contact us head</label>
                    <input type="file" name="contact_us" id="contact_us" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save Settings</button>
    </form>
@endSection
