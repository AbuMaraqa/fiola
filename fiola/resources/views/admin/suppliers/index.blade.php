@extends('layouts.app')
@section('title')
    الموردين
@endsection
@section('header_title')
    الموردين
@endsection
@section('header_link')
    صفحة الموردين
@endsection
@section('header_text')
    الموردين
@endsection
@section('content')
    <div class="container">
        @include('alert_message.success')
        @include('alert_message.fail')
{{--        <a href="{{ route('users.add') }}" class="btn btn-primary mb-2">اضافة مستخدم</a>--}}
         <div class="card">
                <div class="card-header" >
                    <h5 class="text-center">قائمة الموردين</h5>
                </div>

                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                        </div>
                        <form action="{{ route('suppliers.create') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3 bg-gradient-cyan p-4">
                                    <h3 class="text-center">اضافة مورد جديد</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">اسم المورد</label>
                                        <input value="{{ old('name') }}" name="name" type="text" class="form-control">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">البريد الالكتروني</label>
                                        <input value="{{ old('email') }}" name="email" type="text" class="form-control">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">رقم الهاتف</label>
                                        <input value="{{ old('user_phone') }}" name="user_phone" type="text" class="form-control">
                                        @error('user_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group" align="left">
                                        <button type="submit" class="btn btn-sm btn-secondary">اضافة مورد جديد</button>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                           aria-describedby="example1_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                #
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">الاسم
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                البريد الالكتروني
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                حالة الحساب
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">العمليات
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($data as $key)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $key->id }}</td>
                                                <td>{{ $key->name }}</td>
                                                <td>{{ $key->email }}</td>
                                                @if($key->user_status == 0)
                                                    <td class="text-danger">
                                                        غير فعال
                                                    </td>
                                                @else
                                                    <td class="text-success">
                                                        فعال
                                                    </td>
                                                @endif
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit',['id'=>$key->id]) }}">تعديل</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
