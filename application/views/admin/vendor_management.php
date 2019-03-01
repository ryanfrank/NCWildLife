<script>
    function rowFormatter(row, index) {
        if ( ! row.operate ){
            return  '<a data-placement="top" style="color: black" class="fas fa-plus-square fa-lg" id="'+row.vendor_id + '_' +index+'"  data-storeID="'+row.vendor_id+'"></a>'
        }
        else {
            return row.operate;
        }
    }
    function checkInput(input,element,product){
        e = document.getElementById(element + "_add");
        if ( input.length >= 3 ){
            e.style.color = "green";
            e.onclick = function() { addVendor(input, product) };
        }
        else {
            e.style.color = "black";
            e.onclick = function() { return false; };
        }
    }
    function addVendor(input, product){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Product/add/vendor",
            dataType: "json",
            data: { "product": product,
                    "vendorName": input },
            success: function (result) {
                if ( result === "success" ){
                    table.bootstrapTable('refresh');
                    jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 fade show" role="alert">Added Vendor</div>');
                    $('#success-alert').fadeOut(3000);
                }
                else if ( result === "failAssoc"){
                    jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 fade show" role="alert">Failed to create association</div>');
                    $('#error-alert').fadeOut(5000);
                }
                else if ( result === "failAdd"){
                    jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 fade show" role="alert">Failed to add vendor</div>');
                    $('#error-alert').fadeOut(5000);
                }
            }
        });
    }
    var table = $('#productTable');
    $('#vendor-type a').on('click', function (e) {
        table.bootstrapTable('destroy');
        productID = this.id;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Product/vendorLookup",
            dataType: "json",
            data: { "ID": productID },
            success: function (result) {
                counter = result.length;
                $('#tabMessage').hide();
                table.bootstrapTable({
                    height: '550',
                    striped: true,
                    cache: false,
                    showToggle: false,
                    showPaginationSwitch: false,
                    smartDisplay: true,
                    iconsPrefix: 'fa',
                    search: true,
                    showColumns: false,
                    showRefresh: true,
                    pagination: true,
                    pageList: "[10, 25, 50, 100, ALL]",
                    data: result,
                    detailView: true,
                    columns: [
                        { sortable: false, field: 'vendor_id', title: 'Vendor ID', visible: false },
                        { sortable: true, field: 'vendor_name',  title: 'Vendor Name' },
                        { sortable: false, field: 'operate', title: '<a id="vendorAdd" data-placement="top" style="color: green" class="fas fa-plus-square fa-lg"></a>', align: 'center', valign: 'middle', clickToSelect: false,
                            formatter: function (value, row, index, field) {
                                return rowFormatter(row,index);
                            }
                        }
                    ],
                    onExpandRow: function(index,row) {
                        if ( row.vendor_name.length <= 32 ){
                            document.getElementById(row.vendor_id + '_' + index).style.color = "green";
                        }
                    },
                    onCollapseRow: function(index,row) {
                        if ( row.vendor_name.length <= 32 ){
                            document.getElementById(row.vendor_id+'_'+index).style.color = "black";
                        }
                    }
                });
                table.show();
                var counter = 0;
                $('#vendorAdd').off('click');
                $('#vendorAdd').on('click', function (e) {
                    table.bootstrapTable('insertRow', {
                        index: counter,
                        row: {  vendor_name: '<input type="text" id="'+ productID +'_'+counter+'" placeholder="New Vendor Name '+counter+'" oninput="checkInput(this.value, this.id, productID)" />',
                                operate: '<a data-placement="top" style="color: black" class="fas fa-check-square fa-lg" id="'+productID + '_'+counter+'_add"></a>'
                        }
                    });
                    counter++;
                });
            }
        });
    });
</script>
<div class="container-fluid col-12 mt-5">
    <div class="row col-12">
        <div class="col-2">
            <div class="list-group " id="vendor-type" role="tablist" style="max-height: 580px; min-height: 580px; margin-bottom: 10px; overflow:scroll; border: 1px solid darkgrey; box-shadow: 0 0 40px lightgrey;" >
                <?php foreach ($productType->result() as $row):?>
                    <a class="list-group-item list-group-item-action menu-pill" id="<?php echo $row->pT_ID; ?>" data-toggle="list" href="#" role="tab" aria-controls="prodcutType"><?php echo $row->pT_name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-10">
            <div class="container rounded col-12" style="min-height: 580px;  max-height: 580px; border: 1px solid darkgrey; border-radius: 7px; box-shadow: 0 0 20px lightgrey;">
                <div class="row col-12">
                    <div class="tab-content col-12" id="tabContent">
                        <div class="jumbotron mt-4" id="tabMessage" style="border: 1px solid darkgrey; box-shadow: 0 0 40px lightgrey;">
                            <h1 class="display-4">NC Wildlife - Vendor Management</h1>
                            <p class="lead">Manage vendors who provide service or prodcuts used to facilitate rehabilitation of our animals.</p>
                            <hr class="my-4">
                            <h5>Steps:</h5>
                            <ul class="mt-3">
                                <li><p>Select vendor type from the left column</p></li>
                                <li><p>Review data to update from table, make necessary changes</p></li>
                                <li><p>Update/Add vendors as appropriate</p></li>
                            </ul>
                        </div>
                        <div class="mt-2">
                            <table id="productTable" ></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>