@extends('layouts.app')
@section('title')
    الشركات المصنعة
@endsection
@section('header_title')
    الشركات المصنعة
@endsection
@section('header_link')
    الرئيسية
@endsection
@section('header_text')
    الشركات المصنعة
@endsection
@section('content')
        <div class="container">
            @include('alert_message.success')
            @include('alert_message.fail')
            <a href="{{ route('manufacturers.add') }}" class="btn btn-primary mb-2">اضافة شركة مصنعة</a>
             <div class="card">
                    <div class="card-header" >
                        <h5 class="text-center">قائمة الشركات المصنعة</h5>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                @foreach($data as $key)
                                    <div class="col-md-6">
                                    <div class=" m-3" style="height: 150px;min-height: 150px;border:1px solid black;border-radius: 8%">
                                        <div class="mt-4 mr-3" style="height: 150px;min-height: 150px">
                                            <div class="row">
                                                <div class="col-md-5" style="">
                                                    <img class="rounded-circle shadow-4-strong" style="width: 100px;max-width: 100px;height: 100px;max-height: 100px" alt="avatar2" src="{{ asset('storage/uploads/'.$key->manufacturers_logo) }}" />
                                                </div>
                                                <div class="col-md-7 mt-4">
                                                    <h3>{{ $key->manufacturers_name }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                @endforeach
                            </div>
    {{--                        <div class="row">--}}
    {{--                            <div class="col-sm-12">--}}
    {{--                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"--}}
    {{--                                       aria-describedby="example1_info">--}}
    {{--                                    <thead>--}}
    {{--                                    <tr>--}}
    {{--                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"--}}
    {{--                                            rowspan="1" colspan="1" aria-sort="ascending"--}}
    {{--                                            aria-label="Rendering engine: activate to sort column descending">--}}
    {{--                                            #--}}
    {{--                                        </th>--}}
    {{--                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"--}}
    {{--                                            colspan="1" aria-label="Browser: activate to sort column ascending">اسم الشركة--}}
    {{--                                        </th>--}}
    {{--                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"--}}
    {{--                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">--}}
    {{--                                            اللوجو الخاص بالشركة--}}
    {{--                                        </th>--}}
    {{--                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"--}}
    {{--                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">--}}
    {{--                                            العمليات--}}
    {{--                                        </th>--}}
    {{--                                    </tr>--}}
    {{--                                    </thead>--}}
    {{--                                    <tbody>--}}


    {{--                                    @foreach($data as $key)--}}
    {{--                                        <tr class="odd">--}}
    {{--                                            <td class="dtr-control sorting_1" tabindex="0">{{ $key->id }}</td>--}}
    {{--                                            <td>{{ $key->manufacturers_name }}</td>--}}
    {{--                                            <td>--}}
    {{--                                                <img height="200" width="200" src="{{ asset('storage/uploads/'.$key->manufacturers_logo) }}" alt="">--}}
    {{--                                            </td>--}}
    {{--                                            <td>--}}
    {{--                                                <a class="btn btn-primary btn-sm" href="{{ route('manufacturers.edit',['id'=>$key->id]) }}">تعديل</a>--}}
    {{--                                            </td>--}}
    {{--                                        </tr>--}}
    {{--                                    @endforeach--}}
    {{--                                </table>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
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
