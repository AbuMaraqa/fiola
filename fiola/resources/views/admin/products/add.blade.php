@extends('layouts.app')
@section('title')
    اضافة منتج
@endsection
@section('header_title')
    اضافة منتج
@endsection
@section('header_link')
    ادارة المنتجات
@endsection
@section('header_text')
    اضافة منتج
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('products.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">اسم المنتج</label>
                            <input value="{{ old('product_name') }}" name="product_name" class="form-control" type="text" placeholder="ادخل اسم المنتج">
                            @error('product_name')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">باركود المنتج</label>
                            <input value="{{ old('product_barcode') }}" name="product_barcode" class="form-control" type="number" placeholder="ادخل باركود المنتج">
                            @error('product_barcode')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">الشركة المصنعة</label>
                            <select class="form-control" name="product_manufacturer_id" id="">
                                @foreach($data as $key)
                                    <option value="{{ $key->id }}">{{ $key->manufacturers_name }}</option>
                                @endforeach
                            </select>
                            @error('product_manufacturer_id')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">وصف المنتج</label>
                            <textarea placeholder="ادخل وصف المنتج" class="form-control" name="product_description" id="" cols="30" rows="5"></textarea>
                            @error('product_description')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">كلمات دلالية</label>
                            <input value="{{ old('product_tags') }}" name="product_tags" class="form-control" type="text" placeholder="ادخل الكلمات">
                            @error('product_tags')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ملاحظات</label>
                            <textarea placeholder="اكتب ملاحظاتك هنا" class="form-control" name="product_notes" id="" cols="30" rows="5"></textarea>
                            @error('product_notes')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-app bg-success">
                            <i class="fa-solid fa-floppy-disk"></i> حفظ
                        </button>
                    </div>
                    <div class="col-md-4 text-center">
                        <img width="70%" src="{{ asset('storage/uploads/shoesImage.png') }}" alt="">
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
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
