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
            <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $product->id }}" name="id">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">اسم المنتج</label>
                            <input value="{{ old('product_name',$product->product_name) }}" name="product_name" class="form-control" type="text" placeholder="ادخل اسم المنتج">
                            @error('product_name')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">باركود المنتج</label>
                            <input value="{{ old('product_barcode',$product->product_barcode) }}" name="product_barcode" class="form-control" type="number" placeholder="ادخل باركود المنتج">
                            @error('product_barcode')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">الشركة المصنعة</label>
                            <select class="form-control" name="product_manufacturer_id" id="">
                                @foreach($manufacturers as $key)
                                    <option @if(old('product_manufacturer_id',$product->product_manufacturer_id) == $key->id) selected @endif value="{{ $key->id }}">{{ $key->manufacturers_name }}</option>
                                @endforeach
                            </select>
                            @error('product_manufacturer_id')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">وصف المنتج</label>
                            <textarea placeholder="ادخل وصف المنتج" class="form-control" name="product_description" id="" cols="30" rows="5">{{ old('product_description',$product->product_description) }}</textarea>
                            @error('product_description')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input @if(old('product_status',$product->product_status) == 1) checked @endif  name="product_status" type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">حالة المنتج (متوفر / غير متوفر)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">كلمات دلالية</label>
                            <input value="{{ old('product_tags',$product->product_tags) }}" name="product_tags" class="form-control" type="text" placeholder="ادخل الكلمات">
                            @error('product_tags')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <textarea placeholder="اكتب ملاحظاتك هنا" class="form-control" name="product_notes" id="" cols="30" rows="5">{{ old('product_notes',$product->product_notes) }}</textarea>
                            @error('product_notes')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-app bg-success">
                            <i class="fa-solid fa-floppy-disk"></i> حفظ
                        </button>
                    </div>
                    <div class="col-md-4 text-center">
                        <img width="70%" src="{{ asset('storage/uploads/'.old('product_photo',$product->product_photo)) }}" alt="">
                        <div class="form-group">
                            <label for="formFile" class="form-label">صورة المنتج</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input value="{{ old('product_photo') }}" type="file" name="product_photo" class="custom-file-input" id="exampleInputFile">
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
            </form>
        </div>
    </div>

    <div style="height: 25px">

    </div>
@endsection
@section('script')

@endsection
