@extends('layouts.app')
@section('title')
    تعديل مخزن او نقطة بيع
@endsection
@section('header_title')
    تعديل مخزن او نقطة بيع
@endsection
@section('header_link')
    ادارة المخازن او نقاط البيع
@endsection
@section('header_text')
    تعديل مخزن او نقطة بيع
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('colors.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label for="">اسم اللون</label>
                    <input value="{{ old('color_name',$data->color_name) }}" name="color_name" class="form-control" type="text" placeholder="ادخل اسم المخزن او نقطة البيع">
                    @error('color_name')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-app bg-success">
                    <i class="fa-solid fa-floppy-disk"></i> حفظ
                </button>
            </form>
        </div>
    </div>

    <div style="height: 25px">

    </div>
@endsection
@section('script')

@endsection
