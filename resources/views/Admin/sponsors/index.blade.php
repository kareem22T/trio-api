@extends('Admin.layouts.main')

@section("title", "Sponsors")

@php
    $sponsors = App\Models\Sponsor::all();
@endphp

@section("content")
<style>
    #dataTable_wrapper {
        width: 100%
    }
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sponsors</h1>
    <a href="{{ route("admin.sponsors.add") }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Create Sponsor</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive" style="width: auto">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sponsors as $spon)
                        <tr>
                            <td>{{ $spon->name }}</td>
                            <td>
                                <img src="{{$spon->image_path}}" style="width: 55px; height: 55px; object-fit: cover; border-radius: 8px" alt="">
                            </td>
                            <td>
                                <div style="display: flex;gap: 8px">
                                    <a href="{{ route("admin.sponsors.edit", ["id" => $spon->id]) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route("admin.sponsors.delete.confirm", ["id" => $spon->id]) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endSection


@section("scripts")
<script src="{{ asset('/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('/admin/js/demo/datatables-demo.js') }}"></script>
@endSection
