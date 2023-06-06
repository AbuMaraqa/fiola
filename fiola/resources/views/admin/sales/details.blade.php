@extends('layouts.app')
@section('title')
    تفاصيل الفاتورة
@endsection
@section('header_link')
    ادارة الفواتير
@endsection
@section('header_text')
    تفاصيل الفاتورة
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">

        @include('alert_message.success')
        @include('alert_message.fail')

    </div>
    <div class="row mt-3">
        <div class="col-md-12 ">
            <div class="card">
{{--                <div class="card-header text-center">--}}
{{--                    <h4 class="">الاصناف لهذه الفاتورة</h4>--}}
{{--                </div>--}}

                <div class="card-body">
                    <div class="row">

                        <div class="p-1">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                                اضافة اصناف الى الفاتورة
                            </button>
                        </div>
                    </div>

                    <div class="modal fade " id="modal-xl">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">اضافة اصناف الى الفاتورة</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row m-3">
                                        <div class="col-md-12 p-3">
                                            <form action="{{ route('sales.create') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">رقم الفاتورة</label>
                                                            <input required name="invoice_id" class="form-control" type="text" value="{{ $data['invoice_id'] }}">
                                                            @error('invoice_id')
                                                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">رقم الصنف</label>
                                                            <select required class="form-control" name="product_id" id="">
                                                                @foreach($data['product'] as $key)
                                                                    <option value="{{ $key->id }}">{{ $key->product_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('product_id')
                                                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">الكمية من كل نمرة</label>
                                                            <input required="required" value="{{ old('qty') }}" name="qty" class="form-control" type="number" title="الرجاء ادخال الكمية">
                                                            @error('qty')
                                                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">مكان التخزين</label>
                                                            <select required="required" class="form-control" name="inventory_id" id="">
                                                                @foreach($data['inventory'] as $key)
                                                                    <option @if(old('inventory_id',$key->inventory_id)) selected  @endif value="{{ $key->id }}">{{ $key->pos_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('inventory_id')
                                                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">النمرة</label>
                                                            <br>
                                                                <?php
                                                                $counter = 1;
                                                                ?>
                                                            @for ($i = 20; $i < 51; $i++)

                                                                <div class="form-check form-check-inline">
                                                                    <input name="size[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{$counter}}" value="{{ $i }}" @if (in_array($i, old('size', []))) checked @endif>
                                                                    <label class="form-check-label" for="inlineCheckbox{{$counter}}">{{ $i }}</label>
                                                                        <?php
                                                                        $counter++;
                                                                        ?>
                                                                </div>

                                                            @endfor
                                                            <br>
                                                            @error('size')
                                                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">رقم اللون</label>
                                                            <br>
                                                                <?php
                                                                $counter = 1;
                                                                ?>
                                                            @foreach($data['colors'] as $key)
                                                                <div class="form-check form-check-inline">
                                                                    <input name="color[]" class="form-check-input" type="checkbox"
                                                                           id="ColorinlineCheckbox{{$counter}}" value="{{ $key->id }}" @if (in_array($key->id, old('color', []))) checked @endif>
                                                                    <label class="form-check-label"
                                                                           for="ColorinlineCheckbox{{$counter}}">{{ $key->color_name }}</label>
                                                                        <?php
                                                                        $counter++;
                                                                        ?>
                                                                </div>
                                                            @endforeach
                                                            <br>
                                                            @error('color')
                                                            <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر التكلفة</label>
                                                        <input value="{{ old('coast_price') }}" name="coast_price" class="form-control" type="text">
                                                        @error('coast_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر نقطة البيع</label>
                                                        <input value="{{ old('pos_price') }}" name="pos_price" class="form-control" type="text">
                                                        @error('pos_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر تاجر الجملة</label>
                                                        <input value="{{ old('wholesaler_price') }}" name="wholesaler_price" class="form-control" type="text">
                                                        @error('wholesaler_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر تاجر برسم البيع</label>
                                                        <input value="{{ old('consignment_price') }}" name="consignment_price" class="form-control" type="text">
                                                        @error('consignment_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر القطاعي</label>
                                                        <input value="{{ old('sectoral_price') }}" name="sectoral_price" class="form-control" type="text">
                                                        @error('sectoral_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">خصم مسموح به</label>
                                                        <input value="{{ old('discount_permitted') }}" name="discount_permitted" class="form-control" type="text">
                                                        @error('discount_permitted')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر التنزيلات</label>
                                                        <input value="{{ old('discount_price') }}" name="discount_price" class="form-control" type="text">
                                                        @error('discount_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">سعر نقطة بيع وهمي</label>
                                                        <input value="{{ old('phantom_selling_point_price') }}" name="phantom_selling_point_price" class="form-control" type="text">
                                                        @error('phantom_selling_point_price')
                                                        <span class="text-danger mt-2 alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="">ربح المسوق</label>
                                                        <input value="{{ old('marketer_profit') }}" name="marketer_profit" class="form-control" type="text">
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
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">الغاء</button>
                                    {{--                            <button type="button" class="btn btn-success">حفظ</button>--}}
                                </div>
                            </div>

                        </div>

                    </div>


                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">

                                <style>
                                    td{
                                        padding: 2px !important;
                                    }
                                    .inp {
                                        width: 60px;
                                    height: 30px;
                                    }

                                    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
                                        background-color: #f2a600;
                                        color: white;
                                    }

                                </style>
                                <table id="example1"
                                       class="table table-bordered table-striped dataTable dtr-inline table-hover"
                                       aria-describedby="example1_info">
                                    <thead style="font-size: 13px;font-weight: bold" class="text-center">
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">

                                        </th>
                                        <th width="200" class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            الصنف
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            النمرة
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">
                                            اللون
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر التكلفة
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر البيع
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر تاجر الجملة
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر تاجر برسم البيع
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر القطاعي
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            خصم مسموح به
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر التنزيلات
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            سعر نقطة بيع وهمي
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            ربح المسوق
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            العمليات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody align="center" style="">
                                    @foreach($invoice_item as $key)
                                        <tr id="tr_{{ $loop->index }}" onclick="getRowId(this)">
                                            <input type="hidden" name="id" value="{{ $key->id }}">
                                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                                <img style="max-height: 30px;max-width: 30px" src="{{ asset('storage/uploads/'.$key['items']->product_photo)}}" alt="">
                                            </td>
                                            <td class="text-left pl-2">{{ $key['items']->product_name }}</td>
                                            <td class="text-center">{{ $key->size }}</td>
                                            <td class="text-center">
                                                {{ $key['colors']->color_name }}
                                            </td>
                                            <td>
                                                <input id="p1_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'coast_price','p1' )" name="coast_price" value="{{ old('coast_price.'.$loop->index, $key->coast_price) }}" type="number" class="form-control text-center" title="سعر التكلفة" >
                                            </td>
                                            <td>
                                                <input id="p2_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'pos_price' ,'p2')" name="pos_price" value="{{ old('pos_price.'.$loop->index, $key->pos_price) }}" type="number" class="form-control text-center" title="سعر البيع">
                                            </td>
                                            <td>
                                                <input id="p3_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'wholesaler_price' ,'p3')" name="wholesaler_price" value="{{ old('wholesaler_price.'.$loop->index, $key->wholesaler_price) }}" type="number" class="form-control text-center" title="سعر تاجر الجملة">
                                            </td>
                                            <td>
                                                <input id="p4_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'consignment_price' ,'p4')" name="consignment_price" value="{{ old('consignment_price.'.$loop->index, $key->consignment_price) }}" type="number" class="form-control text-center" title="سعر تاجر برسم البيع	">
                                            </td>
                                            <td>
                                                <input id="p5_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'sectoral_price' ,'p5')" name="sectoral_price" value="{{ old('sectoral_price.'.$loop->index, $key->sectoral_price) }}" type="number" class="form-control text-center" title="سعر القطاعي">
                                            </td>
                                            <td>
                                                <input id="p6_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'discount_permitted' ,'p6')" name="discount_permitted" value="{{ old('discount_permitted.'.$loop->index, $key->discount_permitted) }}" type="number" class="form-control text-center" title="خصم مسموح به">
                                            </td>
                                            <td>
                                                <input id="p7_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'discount_price','p7' )" name="discount_price" value="{{ old('discount_price.'.$loop->index, $key->discount_price) }}" type="number" class="form-control text-center" title="سعر التنزيلات">
                                            </td>
                                            <td>
                                                <input id="p8_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'phantom_selling_point_price' ,'p8')" name="phantom_selling_point_price" value="{{ old('phantom_selling_point_price.'.$loop->index, $key->phantom_selling_point_price) }}" name="phantom_selling_point_price" type="number" class="form-control text-center" title="سعر نقطة بيع وهمي">
                                            </td>
                                            <td>
                                                <input id="p9_{{ $key->id }}" onchange="getFieldName(this.value , {{ $key->id }} , 'marketer_profit','p9')" name="marketer_profit" value="{{ old('marketer_profit.'.$loop->index, $key->marketer_profit) }}" type="number" class="form-control text-center" title="ربح المسوق">
                                            </td>
                                            <td class="text-center">
                                                <button onclick="deleteItem({{ $key->id }}, {{ $loop->index }})" class="btn btn-sm btn-danger">X</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('assets/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>

        function getRowId(row) {
            var rowId = row.rowIndex; // يحصل على مؤشر الصف الذي تم النقر عليه

            // alert(rowId);
            console.log("تم النقر على الصف رقم: " + rowId);
        }

        function getFieldName(input , f_id , f_name , index) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var fieldName = input.name;
            // alert(fieldName);
            var x = document.getElementById(''+index+'_'+f_id) ;

            // $.post("/sales/editInvoiceItemsSales/",
            //     {
            //         id: f_id,
            //         column_value: x.value
            //     },
            //     function(data, status){
            //         alert("Data: " + data + "\nStatus: " + status);
            //     });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            $.ajax({
                type: "POST",
                url: "/sales/editInvoiceItemsSales",
                data:{
                    '_token': csrfToken,
                    'id':f_id,
                    'column_name':f_name,
                    'column_value':x.value,
                },

                success: function(response) {
                    // alert(response);
                    if(response['message'] == 'success'){

                        var interval = setInterval(function() {
                            // Code to be executed repeatedly
                            x.style.backgroundColor = 'green';
                            x.style.color = 'white';
                        }, 0); // 1000 milliseconds = 1 second

// To stop the interval after a certain duration
                        setTimeout(function() {
                            clearInterval(interval); // Clear the interval
                            x.style.backgroundColor = '';
                            x.style.color = 'black';
                        }, 500);

                        toastr.success('تم التعديل بنجاح');
                    }
                    else{
                        toastr.error('لم يتم التعديل');
                    }
                }
            });
        }

        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false,'bPaginate' : false
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

    <script>
        function deleteItem(id,index) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                type: "GET",
                url: "/sales/deleteInvoiceItemsSales/"+id,
                success: function(response) {
                    if(response['message'] == 'success'){
                        document.getElementById('tr_'+index).remove();
                        toastr.success('تم الحذف بنجاح');
                    }
                    else{
                        toastr.error('لم يتم الحذف هناك خلل ما');
                    }
                }
            });
        }
    </script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });


            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });

        });
    </script>

@endsection
