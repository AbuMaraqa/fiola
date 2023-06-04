@extends('layouts.app')
@section('title')
    تفاصيل مخزن او نقطة بيع
@endsection
@section('header_title')
    تفاصيل مخزن او نقطة بيع
@endsection
@section('header_link')
    ادارة المخازن او نقاط البيع
@endsection
@section('header_text')
    تفاصيل مخزن او نقطة بيع
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <div class="form-group">
                <label for="">اسم المخزن او نقطة البيع</label>
                <input type="text" disabled class="form-control" value="{{ old('pos_name',$data->pos_name) }}">
            </div>
            <div class="form-group">
                <label for="">العنوان</label>
                <input type="text" disabled class="form-control" value="{{ old('pos_address',$data->pos_address) }}">
            </div>
            <div class="form-group">
                <label for="">رقم الهاتف</label>
                <input type="text" disabled class="form-control" value="{{ old('pos_phone',$data->pos_phone) }}">
            </div>
            <div class="form-group">
                <label for="">النوع</label>
                <input type="text" disabled class="form-control" @if(old('pos_type',$data->pos_type) == 1) value="مخزن" @elseif(old('pos_type',$data->pos_type) == 2) value="نقطة بيع" @endif>
            </div>
        </div>
    </div>

    <div style="height: 25px">

    </div>
@endsection
@section('script')

@endsection
