@extends('layouts.app')
@section('title')
    تعديل منتج
@endsection
@section('header_title')
    تعديل منتج
@endsection
@section('header_link')
    ادارة المنتجات
@endsection
@section('header_text')
    تعديل منتج
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">اسم المنتج</label>
                            <input disabled value="{{ $data['products']->product_name }}" name="product_name" class="form-control" type="text" placeholder="ادخل اسم المنتج">
                            @error('product_name')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">باركود المنتج</label>
                            <input disabled value="{{ $data['products']->product_barcode }}" name="product_barcode" class="form-control" type="number" placeholder="ادخل باركود المنتج">
                            @error('product_barcode')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">الشركة المصنعة</label>
                            <input type="text" disabled class="form-control" value="{{ $data['products']['manufacturer']->manufacturers_name }}">
                            @error('product_manufacturer_id')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">وصف المنتج</label>
                            <textarea disabled placeholder="ادخل وصف المنتج" class="form-control" name="product_description" id="" cols="30" rows="5">{{ $data['products']->product_description }}</textarea>
                            @error('product_description')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input disabled type="text" class="form-control" @if($data['products']->product_status == 1) value="متوفر" @else value="غير متوفر" @endif>
                        </div>
                        <div class="form-group">
                            <label for="">كلمات دلالية</label>
                            <input disabled value="{{ $data['products']->product_tags }}" name="product_tags" class="form-control" type="text" placeholder="ادخل الكلمات">
                            @error('product_tags')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <textarea disabled placeholder="اكتب ملاحظاتك هنا" class="form-control" name="product_notes" id="" cols="30" rows="5">{{ $data['products']->product_notes }}</textarea>
                            @error('product_notes')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-4 text-center">
                        <img width="70%" src="{{ asset('storage/uploads/'.old('product_photo',$data['products']->product_photo)) }}" alt="">
                        <div class="form-group">
                            <label for="formFile" class="form-label">صورة المنتج</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input disabled value="{{ old('product_photo') }}" type="file" name="product_photo" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">اختر ملف</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">اختر ملف</span>
                                </div>
                            </div>
                            @error('product_photo')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div style="height: 25px">

    </div>
@endsection
@section('script')

@endsection
