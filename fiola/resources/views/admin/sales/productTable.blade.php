<div id="targetElement1">
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="row">
        <div class="col">
            <table style="padding: 1px !important;margin: 1px !important;" id="example2" class="table table-bordered table-striped dataTable dtr-inline"
                   aria-describedby="example1_info">
                <thead>
                <tr>
{{--                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"--}}
{{--                        rowspan="1" colspan="1" aria-sort="ascending"--}}
{{--                        aria-label="Rendering engine: activate to sort column descending">--}}
{{--                        #--}}
{{--                    </th>--}}
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending">
                        اسم الصنف
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                        colspan="1" aria-label="Browser: activate to sort column ascending">الكمية
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                        سعر الوحدة
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                        السعر النهائي
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                        colspan="1" aria-label="Engine version: activate to sort column ascending">
                    </th>
                </tr>
                </thead>
                <tbody id="productTableBody">
                <?php
                    $sum = 0;
                ?>
                @foreach($data as $key)
                        <?php
                            $sum += ($key->pos_price * $key->qty);
                        ?>

                        <tr class="odd text-center" id="row_{{ $key->id }}">
                            <input type="hidden" id="invoice_id" value="{{ $key->invoice_id }}">
{{--                            <td>{{ $key->id }}</td>--}}
                            <td>{{ $key['items']->product_name .' - '. $key->size }}</td>
                            <td>{{ $key->qty }}</td>
                            <td>{{ $key->pos_price }}</td>
                            <td>{{ $key->pos_price * $key->qty }}</td>
                            <td>
                                <button onclick="deleteClickHandler({{ $key }})" class="btn btn-danger">X</button>
                            </td>
                        </tr>
                    @endforeach
                <tr class="text-center">
                    <td colspan="3">المجموع</td>
                    <td><?php echo $sum ?></td>
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">خصم</td>
                    <td>0</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>
    function asd(){
        alert('asd');
    }
    function deleteClickHandler(rowData,row) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // alert(row);
        // alert(rowData.id);
        $.ajax({
            type: 'get',
            url: '/sales/deleteProductFromSalesInvoice/'+rowData.id+"",
            data:{
              'invoice_id':document.getElementById('invoice_id').value,
            },
            success: function(response) {
                console.log(response);
                $('#targetElement1').html(response);

                // Get the ID from the database here
                var databaseId = rowData.id;
                console.log('Database ID:', databaseId);
            }
        });
    }
</script>
