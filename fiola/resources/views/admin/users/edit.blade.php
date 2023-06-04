@extends('layouts.app')
@section('title')
    تعديل مستخدم
@endsection
@section('header_title')
    تعديل مستخدم
@endsection
@section('header_link')
    ادارة المستخدمين
@endsection
@section('header_text')
    تعديل مستخدم
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('users.update',['user_id'=>$data->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">الاسم الكامل</label>
                    <input value="{{ old('name',$data->name) }}" name="name" class="form-control" type="text" placeholder="ادخل الاسم الكامل">
                    @error('name')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">البريد الالكتروني</label>
                    <input value="{{ old('email',$data->email) }}" name="email" class="form-control" type="text" placeholder="ادخل البريد الالكتروني">
                    @error('email')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">كلمة المرور</label>
                    <input value="{{ old('password') }}" name="password" class="form-control" type="password" placeholder="ادخل كلمة المرور">
                    @error('password')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">رقم الهاتف</label>
                    <input value="{{ old('user_phone',$data->user_phone) }}" name="user_phone" class="form-control" type="text" placeholder="ادخل رقم الهاتف">
                    @error('user_phone')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">تاريخ الميلاد</label>
                    <input value="{{ old('dob',$data->dob) }}" name="dob" class="form-control text-center" type="date" placeholder="ادخل كلمة المرور">
                    @error('dob')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">حالة الحساب (مفعل / معطل)</label>
                    <!-- Default checked -->
                    <div class="custom-control custom-switch">
                        <input {{ old('user_status',$data->user_status) ? 'checked' : '' }} name="user_status" type="checkbox" class="custom-control-input" id="customSwitch1" >
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">الصلاحية</label>
                    <select class="form-control" name="role" id="">
                        <option value="1" {{ old('role',$data->role) == 1 ? 'selected' : '' }}>مسؤول النظام</option>
                        <option value="2" {{ old('role',$data->role) == 2 ? 'selected' : '' }}>مدخل بيانات - موظف مبيعات</option>
                        <option value="3" {{ old('role',$data->role) == 3 ? 'selected' : '' }}>زبون</option>
                        <option value="4" {{ old('role',$data->role) == 4 ? 'selected' : '' }}>مورد</option>
                        <option value="5" {{ old('role',$data->role) == 5 ? 'selected' : '' }}>شركة توصيل</option>
                    </select>
                    @error('role')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
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
