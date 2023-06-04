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
            <form action="{{ route('pos.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label for="">اسم المخزن او نقطة البيع</label>
                    <input value="{{ old('pos_name',$data->pos_name) }}" name="pos_name" class="form-control" type="text" placeholder="ادخل اسم المخزن او نقطة البيع">
                    @error('pos_name')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">العنوان</label>
                    <input value="{{ old('pos_address',$data->pos_address) }}" name="pos_address" class="form-control" type="text" placeholder="ادخل العنوان">
                    @error('pos_address')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">رقم الهاتف</label>
                    <input value="{{ old('pos_phone',$data->pos_phone) }}" name="pos_phone" class="form-control" type="text" placeholder="ادخل رقم الهاتف">
                    @error('pos_phone')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">النوع</label>
                    <select class="form-control" name="pos_type" id="">
                        <option @if(old('pos_type',$data->pos_type) == 1) selected @endif value="1">مخزن</option>
                        <option @if(old('pos_type',$data->pos_type) == 2) selected @endif value="2">نقطة بيع</option>
                    </select>
                    @error('pos_type')
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
