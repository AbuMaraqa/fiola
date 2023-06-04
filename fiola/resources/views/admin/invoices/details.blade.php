@extends('layouts.app')
@section('title')
    تفاصيل فاتورة
@endsection
@section('header_title')
    تفاصيل فاتورة
@endsection
@section('header_link')
    ادارة الفواتير
@endsection
@section('header_text')
    تفاصيل فاتورة
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('invoices.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">العميل</label>
                    <select class="form-control" name="user_id" id="">
                        @foreach($data['users'] as $key)
                            <option value="{{ $key->id }}">{{ $key->name }} <span>@if($key->role == 3) (زبون) @elseif($key->role == 4) (مورد) @endif</span></option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">نوع الفاتورة</label>
                    <select class="form-control" name="invoices_type" id="">
                        <option value="1">مبيعات</option>
                        <option value="2">مشتريات</option>
                    </select>
                    @error('invoices_type')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">المخزن او نقطة البيع</label>
                    <select class="form-control" name="inventory_id" id="">
                        @foreach($data['inventory'] as $key)
                            <option value="{{ $key->id }}">{{ $key->pos_name }}</option>
                        @endforeach
                    </select>
                    @error('inventory_id')
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
