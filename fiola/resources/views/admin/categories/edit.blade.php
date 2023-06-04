@extends('layouts.app')
@section('title')
    تعديل الشركة المصنعة
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
            <form action="{{ route('categories.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group">
                    <label for="">اسم التصنيف</label>
                    <input value="{{ old('categories_name',$data->categories_name) }}" name="categories_name" class="form-control" type="text" placeholder="ادخل اسم التصنيف">
                    @error('categories_name')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">مرتبط ب</label>
                    <select class="form-control" name="parent_id" id="">
                        <option value="0">اب</option>
                        @foreach($data['cat'] as $key)
                            <option @if(old('id',$key->id) == $data->parent_id) selected @endif value="{{$key->id}}" >{{ $key->categories_name }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
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
