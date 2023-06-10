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
            <div class="row">
                <div class="col-md-4 p-3" style="border: 1px solid black">
                    <form action="{{ route('sales.create') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">رقم الفاتورة</label>
                            <input name="invoice_id" class="form-control" type="text" value="{{ $data['invoice_id'] }}">
                            @error('invoice_id')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم الصنف</label>
                            <select class="form-control" name="product_id" id="">
                                @foreach($data['product'] as $key)
                                    <option value="{{ $key->id }}">{{ $key->product_name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">الكمية من كل نمرة</label>
                            <input name="qty" class="form-control" type="text">
                            @error('qty')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">النمرة</label>
                            <br>

                                <?php
                                $counter = 1;
                                ?>
                            @for ($i = 20; $i < 51; $i++)

                                <div class="form-check form-check-inline">
                                    <input name="size[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{$counter}}" value="{{ $i }}">
                                    <label class="form-check-label" for="inlineCheckbox{{$counter}}">{{ $i }}</label>
                                        <?php
                                        $counter ++;
                                        ?>
                                </div>

                            @endfor
                            <br>
                            @error('size')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">رقم اللون</label>
                            <br>
                                <?php
                                $counter = 1;
                                ?>
                            @foreach($data['colors'] as $key)
                                <div class="form-check form-check-inline">
                                    <input name="color[]" class="form-check-input" type="checkbox" id="ColorinlineCheckbox{{$counter}}" value="{{ $key->id }}">
                                    <label class="form-check-label" for="ColorinlineCheckbox{$counter}}">{{ $key->color_name }}</label>
                                        <?php
                                        $counter ++;
                                        ?>
                                </div>
                            @endforeach
                            <br>
                            @error('color')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">مكان التخزين</label>
                            <select class="form-control" name="inventory_id" id="">
                                @foreach($data['inventory'] as $key)
                                    <option value="{{ $key->id }}">{{ $key->pos_name }}</option>
                                @endforeach
                            </select>
                            @error('inventory_id')
                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">سعر التكلفة</label>
                                <input name="coast_price" class="form-control" type="text">
                                @error('coast_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">سعر نقطة البيع</label>
                                <input name="pos_price" class="form-control" type="text">
                                @error('pos_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">سعر تاجر الجملة</label>
                                <input name="wholesaler_price" class="form-control" type="text">
                                @error('wholesaler_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">سعر تاجر برسم البيع</label>
                                <input name="consignment_price" class="form-control" type="text">
                                @error('consignment_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">سعر القطاعي</label>
                                <input name="sectoral_price" class="form-control" type="text">
                                @error('sectoral_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">خصم مسموح به</label>
                                <input name="discount_permitted" class="form-control" type="text">
                                @error('discount_permitted')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">سعر التنزيلات</label>
                                <input name="discount_price" class="form-control" type="text">
                                @error('discount_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">سعر نقطة بيع وهمي</label>
                                <input name="phantom_selling_point_price" class="form-control" type="text">
                                @error('phantom_selling_point_price')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">ربح المسوق</label>
                                <input name="marketer_profit" class="form-control" type="text">
                                @error('marketer_profit')
                                <span class="text-danger mt-2 alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary">حفظ</button>
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
