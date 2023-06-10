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
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <input type="hidden" value="{{ $data->id }}" name="id" id="invoice_id">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group col-md-6">
                            <label>اختيار صنف</label>
                            <select onchange="selectItems(this.value)" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option  value=""></option>
                                @foreach($data['items'] as $key)
                                    <option  value="{{ $key->id }}">{{ $key->product_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="">
                                    <table id="example1" class="table table-bordered productTable table-striped dataTable dtr-inline"
                                           aria-describedby="example1_info">
                                        <thead>
                                        <tr>
{{--                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"--}}
{{--                                                rowspan="1" colspan="1" aria-sort="ascending"--}}
{{--                                                aria-label="Rendering engine: activate to sort column descending">#--}}
{{--                                            </th>--}}
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">الصنف
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">الكمية في المخزون
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">سعر البيع
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbodyss" class="text-center">
                                        <tr class="odd" id="items">
{{--                                            <td class="dtr-control sorting_1" tabindex="0">asdadasdasdasdas</td>--}}
{{--                                            <td>Firefox 1.0</td>--}}
{{--                                            <td><a href="" class="btn btn-danger btn-sm">X</a></td>--}}
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div  id="targetElement">

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
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            });
        });
        function selectItems(product_id) {
            var addedRows = [];
            $.ajax({
                type: "get",
                url: "/sales/selectAllProductInInvoicesItems?product_id="+product_id,
                waiting:document.getElementById('tbodyss').innerText = 'جاري التحميل ...',
                success: function(response) {
                    if(response['message'] == 'success'){
                        // console.log(response);
                        var data = response['data'];
                        var tableBody = $('.productTable tbody');
                        var headerRow = $('<tr>');
                        tableBody.empty();

                        for (var i = 0; i < data.length; i++) {
                            var rowData = data[i];
                            var pos_price = data[i]['pos_price'] ;
                            var qty = data[i]['qty'] ;

                            var row = $('<tr data-toggle="tooltip" data-placement="top" title="<strong>Tooltip</strong> <em>content</em>">');

                            // Create table cells and populate them with data
                            //     var cell1 = $('<td>').text(data[i]['id']);
                                var cell1 = $('<td>').text(data[i]['items']['product_name']+' - '+data[i]['size']+' - '+data[i]['color']['color_name']);
                            var qtyInput = $('<input>').attr({
                                'width': '50',
                                'name': 'qty',
                                'style': 'width: 50px; text-align: center;',
                                'class': '',
                                'value': qty
                            });

                            // var cell2 = $('<td>').html('<input width="50" name="qty" value="'+qty+'" style=" width: 50px; text-align: center; " class="">');
                            var cell2 =$('<td>').html(qtyInput);
                            var posPriceInput = $('<input>').attr({
                                'width': '50',
                                'name': 'qty',
                                'style': 'width: 50px; text-align: center;',
                                'class': '',
                                'value': pos_price
                            });
                                // var cell3 = $('<td>').html('<input width="50" value="'+pos_price+'" style=" width: 50px; text-align: center; " class="">');
                            var cell3 = $('<td>').html(posPriceInput);
                                var cell4 = $('<td>').html('<a class="btn btn-success text-white">+</a>').click(createClickHandler(rowData,qtyInput,posPriceInput));

                                // Add more cells as needed
                                row.append(cell1, cell2, cell3,cell4);
                                tableBody.append(row);
                                addedRows.push(rowData.id);
                        }
                        // toastr.success('تم اضافة الصنف بنجاح');
                    }
                    else{
                        aslert('error');
                        // toastr.error('هناك خلل ما لم يتم اضافة الصنف');
                    }
                }
            });

        }

            window.onload = function (){
                $.ajax({
                    type:'get',
                    url:'/sales/getProductOnLoad/'+document.getElementById('invoice_id').value,
                    success:function (response) {
                        console.log(response);
                        $('#targetElement').html(response);
                    },
                    waiting:function () {
                        document.getElementById('targetElement').innerHTML = 'جاري التحميل ...';
                    },
                });
            }

        function createClickHandler(rowData,qty,pos_price) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            return function() {
                var currentRowData = rowData;
                $.ajax({
                    type: 'post',
                    url: '/sales/createSalesInvoiceItems',
                    data: {
                        '_token': csrfToken,
                        'data': currentRowData,
                        'invoice_id': document.getElementById('invoice_id').value,
                        'qty':qty.val(),
                        'pos_price':pos_price.val(),
                    },
                    success: function(response) {
                        console.log(response);
                        $('#targetElement').html(response);

                        // Get the ID from the database here
                        var databaseId = currentRowData.id;
                        console.log('Database ID:', databaseId);
                    }
                });
            }
        }

        function deleteClickHandler(rowData) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            return function() {
                var currentRowData = rowData;
                $.ajax({
                    type: 'get',
                    url: '/sales/deleteProductFromSalesInvoice/'+currentRowData.id,
                    data: {
                        '_token': csrfToken,
                        'data': currentRowData,
                        'invoice_id': document.getElementById('invoice_id').value
                    },
                    success: function(response) {
                        console.log(response);
                        $('#targetElement').html(response);

                        // Get the ID from the database here
                        var databaseId = currentRowData.id;
                        console.log('Database ID:', databaseId);
                    }
                });
            }
        }

    </script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,'bPaginate':false
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });

        $(function () {
            $("#example2").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,'bPaginate':false
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });

    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({icons: {time: 'far fa-clock'}});

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function (file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function () {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function (progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function (file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function (progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function () {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function () {
            myDropzone.removeAllFiles(true)
        }
    </script>
@endsection
