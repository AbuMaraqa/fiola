@extends('layouts.app')
@section('title')
    اضافة مستخدم
@endsection
@section('header_title')
    اضافة مستخدم
@endsection
@section('header_link')
    ادارة المستخدمين
@endsection
@section('header_text')
    اضافة مستخدم
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('users.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">الاسم الكامل</label>
                    <input value="{{ old('name') }}" name="name" class="form-control" type="text" placeholder="ادخل الاسم الكامل">
                    @error('name')
                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">البريد الالكتروني</label>
                    <input value="{{ old('email') }}" name="email" class="form-control" type="text" placeholder="ادخل البريد الالكتروني">
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
                    <input value="{{ old('user_phone') }}" name="user_phone" class="form-control" type="text" placeholder="ادخل رقم الهاتف">
                    @error('user_phone')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">تاريخ الميلاد</label>
                    <input value="{{ old('dob') }}" name="dob" class="form-control text-center" type="date" placeholder="ادخل كلمة المرور">
                    @error('dob')
{{--                    <span class="text-danger mt-2 alert">{{ $message }}</span>--}}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">الصلاحية</label>
                    <select class="form-control" name="role" id="">
                        <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>مسؤول النظام</option>
                        <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>مدخل بيانات - موظف مبيعات</option>
{{--                        <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>زبون</option>--}}
{{--                        <option value="4" {{ old('role') == 4 ? 'selected' : '' }}>مورد</option>--}}
{{--                        <option value="5" {{ old('role') == 5 ? 'selected' : '' }}>شركة توصيل</option>--}}
                    </select>
                    @error('role')
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
