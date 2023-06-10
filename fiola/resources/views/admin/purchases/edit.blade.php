@extends('layouts.app')
@section('title')
    تعديل فاتورة المشتريات
@endsection
@section('header_title')
    تعديل فاتورة المشتريات
@endsection
@section('header_link')
    ادارة فاتورة المشتريات
@endsection
@section('header_text')
    تعديل فاتورة المشتريات
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('purchases.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label for="">الزبون</label>
                    <select class="form-control" name="user_id" id="">
                        @foreach($users as $key)
                            <option @if(old('id',$key->id) == $data->user_id) selected @endif value="{{ $key->id }}">{{ $key->name }} <span>@if($key->role == 3) (زبون) @elseif($key->role == 4) (مورد) @endif</span></option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">المخزن</label>
                    <select class="form-control" name="inventory_id" id="">
                        @foreach($inventory as $key)
                            <option @if(old('id',$key->id) == $data->inventory_id) selected @endif value="{{ $key->id }}">{{ $key->pos_name }}</option>
                        @endforeach
                    </select>
                    @error('inventory_id')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-app bg-success">
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
