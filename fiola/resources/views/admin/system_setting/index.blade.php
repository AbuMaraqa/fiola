@extends('layouts.app')
@section('title')
    اعدادات النظام
@endsection
@section('header_title')
    اعدادات النظام
@endsection
@section('header_link')
    الرئيسية
@endsection
@section('header_text')
    اعدادات النظام
@endsection
@section('content')
    <div class="container">
        @include('alert_message.success')
        @include('alert_message.fail')
        {{--        <a href="{{ route('users.add') }}" class="btn btn-primary mb-2">اضافة مستخدم</a>--}}
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="">اسم الشركة</label>
                <input type="text" name="company_name" class="form-control" value="{{ old('company_name',$data->company_name) }}">
            </div>
            <div class="form-group">
                <label for="">الموقع</label>
                <input type="text" name="company_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">رقم الهاتف</label>
                <input type="text" name="company_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">فاكس</label>
                <input type="text" name="company_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">الموقع الالكتروني</label>
                <input type="text" name="company_name" class="form-control">
            </div>
            <button class="btn btn-success">حفظ</button>
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
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
