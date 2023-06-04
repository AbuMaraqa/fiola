@extends('layouts.app')
@section('title')
    تعديل شركة مصنعة
@endsection
@section('header_title')
    تعديل شركة مصنعة
@endsection
@section('header_link')
    ادارة الشركات المصنعة
@endsection
@section('header_text')
    تعديل شركة مصنعة
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('manufacturers.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label for="">اسم الشركة المصنعة</label>
                    <input value="{{ old('manufacturers_name',$data->manufacturers_name) }}" name="manufacturers_name" class="form-control" type="text" placeholder="ادخل الاسم الكامل">
                    @error('manufacturers_name')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <img class="img-thumbnail d-block m-3" width="200" height="200" src="{{ asset('storage/uploads/'.$data->manufacturers_logo) }}" alt="">
                    <label>الملف الموجود مسبقا : </label>
                    <input type="text" value="{{ old('manufacturers_logo',$data->manufacturers_logo) }}" disabled>
                    <br>
                    <label>تحميل ملف</label>
                    <input type="file" name="manufacturers_logo">
                    @error('manufacturers_logo')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
                <button type="submit" class="btn btn-app bg-primary">
                    <i class="fa-solid fa-floppy-disk"></i> تعديل
                </button>
            </form>
        </div>
    </div>

    <div style="height: 25px">

    </div>
@endsection
@section('script')

@endsection
