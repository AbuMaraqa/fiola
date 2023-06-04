@extends('layouts.app')
@section('title')
    اضافة مخزن او نقطة بيع
@endsection
@section('header_title')
    اضافة مخزن او نقطة بيع
@endsection
@section('header_link')
    المخازن او نقاط البيع
@endsection
@section('header_text')
    اضافة مخزن او نقطة بيع
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('pos.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">اسم المخزن او نقطة البيع</label>
                    <input value="{{ old('pos_name') }}" name="pos_name" class="form-control" type="text" placeholder="ادخل اسم المخزن او نقطة البيع">
                    @error('pos_name')
                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">العنوان</label>
                    <input value="{{ old('pos_address') }}" name="pos_address" class="form-control" type="text" placeholder="ادخل العنوان">
                    @error('pos_address')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">رقم الهاتف</label>
                    <input value="{{ old('pos_phone') }}" name="pos_phone" class="form-control" type="text" placeholder="ادخل رقم الهاتف">
                    @error('pos_phone')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">النوع</label>
                    <select class="form-control" name="pos_type" id="">
                        <option value="1">مخزن</option>
                        <option value="2">نقطة بيع</option>
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
