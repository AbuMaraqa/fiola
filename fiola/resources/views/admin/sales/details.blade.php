@extends('layouts.app')
@section('title')
    تفاصيل الفاتورة
@endsection
@section('header_link')
    ادارة الفواتير
@endsection
@section('header_text')
    تفاصيل الفاتورة
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">

        @include('alert_message.success')
        @include('alert_message.fail')

    </div>
    <div class="row mt-3">
        <div class="col-md-12 ">
            <div class="card">
                {{--                <div class="card-header text-center">--}}
                {{--                    <h4 class="">الاصناف لهذه الفاتورة</h4>--}}
                {{--                </div>--}}

                <div class="card-body">
                    <div class="form-group">
                        <label for="">اسم الزبون</label>
                        <input class="form-control" readonly type="text" value="{{ $data['users']['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="">تاريخ الفاتورة</label>
                        <input class="form-control" readonly type="text" value="{{ $data['invoices']['date_time'] }}">
                    </div>
                    <div class="form-group">
                        <label for="">نوع الفاتورة</label>
                        <input class="form-control" readonly type="text" @if($data['invoices']->invoices_type == 1) value="مبيعات" @else value="مشتريات" @endif>
                    </div>
                    <div class="form-group">
                        <label for="">حالة الفاتورة</label>
                        <input class="form-control" readonly type="text">
                    </div>
                    <div class="form-group">
                        <label for="">تم اضافتها بواسطة</label>
                        <input class="form-control" readonly type="text" value="{{ $data['added_by']->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">المخزن</label>
                        <input class="form-control" readonly type="text" value="{{ $data['inventory']->pos_name }}">
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
