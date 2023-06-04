@extends('layouts.app')
@section('title')
    فواتيري
@endsection
@section('header_title')
    فواتيري
@endsection
@section('header_link')
    الرئيسية
@endsection
@section('header_text')
    فواتيري
@endsection
@section('content')
        <div class="container">
            @include('alert_message.success')
            @include('alert_message.fail')
            <a href="{{ route('invoices.add') }}" class="btn btn-primary mb-2">اضافة فاتورة</a>
             <div class="card">
                    <div class="card-header" >
                        <h5 class="text-center">قائمة الفواتير</h5>
                    </div>

                    <div class="card-body">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        رقم الفاتورة
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">المستخدم
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        نوع الفاتورة
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        حالة الفاتورة
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        بواسطة
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        المخزن او نقطة البيع
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        العمليات
                                    </th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($data as $key)
                                    <tr class="odd">
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->user->name }}</td>
                                        <td>
                                            @if($key->invoices_type == 1)
                                                فاتورة مبيعات
                                            @elseif($key->invoices_type == 2)
                                                فاتورة مشتريات
                                            @endif
                                        </td>
                                        <td>
                                            @if($key->invoices_status == 1)
                                                فعالة
                                            @else
                                                غير فعالة
                                            @endif
                                        </td>
                                        <td>{{ $key->added_by->name }}</td>
                                        <td>{{ $key->inventory->pos_name }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="">تعديل</a>
                                            <a class="btn btn-sm btn-dark" href="{{ route('invoices.details',['id'=>$key->id]) }}">عرض</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
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
