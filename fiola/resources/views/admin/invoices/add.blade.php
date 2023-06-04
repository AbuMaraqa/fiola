@extends('layouts.app')
@section('title')
    اضافة فاتورة
@endsection
@section('header_title')
    اضافة فاتورة
@endsection
@section('header_link')
    ادارة الفواتير
@endsection
@section('header_text')
    اضافة فاتورة
@endsection
@section('content')
    <div class="container">
        <div class="card p-3">
            <form action="{{ route('invoices.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">العميل</label>
                    <select class="form-control" name="user_id" id="">
                        @foreach($users as $key)
                            <option value="{{ $key->id }}">{{ $key->name }} <span>@if($key->role == 3) (زبون) @elseif($key->role == 4) (مورد) @endif</span></option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">نوع الفاتورة</label>
                    <select class="form-control" name="invoices_type" id="">
                        <option value="1">مبيعات</option>
                        <option value="2">مشتريات</option>
                    </select>
                    @error('invoices_type')
                    <span class="text-danger mt-2 alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">المخزن او نقطة البيع</label>
                    <select class="form-control" name="inventory_id" id="">
                        @foreach($inventory as $key)
                            <option value="{{ $key->id }}">{{ $key->pos_name }}</option>
                        @endforeach
                    </select>
                    @error('inventory_id')
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
