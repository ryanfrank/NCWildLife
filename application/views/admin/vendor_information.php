<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2018-12-29
 * Time: 20:27
 */
?>
<script type="application/javascript">
    function getHeight() {
        return $(window).height() - $('h1').outerHeight(true);
    }
    var table = $('#productTable');
    $('#productTypes').change(function(){
        table.bootstrapTable('destroy');
        var e = document.getElementById("productTypes");
        var productTypesID = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/getVendor",
            dataType: 'json',
            data: {
                "typeID": productTypesID,
                "type"  : 'productType'
            },
            success: function(result){
                $('#vendorName').empty();
                $('#vendorName').append('<option value="" ></option>');
                $.each(result, function(i, val){
                    $('#vendorName').append('<option value="' + val['vendor_id'] + '" >'+ val['vendor_name'] +'</option>');
                    document.getElementById("vendorName").disabled = false;
                });
            }
        });
    });
    $('#vendorName').change(function(){
        table.bootstrapTable('destroy');
        var e = document.getElementById("vendorName");
        var vendorNameID = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/getVendor",
            dataType: 'json',
            data: {
                "type"  : 'vendorLookup',
                "nameID": vendorNameID
            },
            success: function(result) {
                table.bootstrapTable({
                    height: getHeight(),
                    striped: false,
                    cache: false,
                    data: result,
                    detailView: true,
                    onExpandRow: function(index, row, $detail) {  getVendorContact(index, row, $detail); }
                });
            }
        });
    });
    function getVendorContact (index, row, $detail){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/getVendor",
            dataType: 'json',
            data: {
                "vInfoID": row['vInfoID'],
                "type"  : 'vendorInformation'
            },
            success: function(result){
                $detail.html('<table id="subTable"><tbody></tbody></table>').find('table').bootstrapTable({
                    height: getHeight(),
                    striped: false,
                    cache: false,
                    detailView: true,
                    data: result,
                    columns: [
                        //{ radio: true //},
                        { sortable: false, field: 'v_first_name', title: 'First Name' },
                        { sortable: false, field: 'v_last_name', title: 'Last Name' },
                        { sortable: false, field: 'v_phone', formatter: function (value) { return formatPhoneNumber(value); }, title: 'Phone Number' },
                        { sortable: false, field: 'contact_type', title: 'Contact Type' },
                        { sortable: false, field: 'v_contact_position', title: 'Position' }
                    ]
                });

            }
        });
    }
</script>
<div class="container-fluid col-12 ml-5">
    <div class="row align-center">
        <div class="col-2">
            <div class="form-group">
                <label for="productTypes" class="align-content-center">Product Type</label>
                <select class="form-control" id="productTypes">
                    <option></option>
                    <?php foreach ($productType->result() as $row):?>
                        <option value="<?php echo $row->pT_ID ?>"><?php echo $row->pT_name ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group col-5">
                <label for="vendorName" class="align-content-center">Vendor Name</label>
                <select class="form-control" id="vendorName" disabled>
                    <option>Select Type First</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row align-center">
        <div id="myTable" class="col-10 align-center" >
            <table id="productTable"
                   data-search="true"
                   data-striped="true"
                   data-show-refresh="true"
                   data-show-toggle="true"
                   data-show-columns="true"
                   data-show-export="true"
                   data-show-pagination-switch="true"
                   data-pagination="true"
                   data-id-field="vendor_name"
                   data-page-list="[10, 25, 50, 100, ALL]"
                   data-show-footer="false"
            >
            <thead>
            <tr>
                <th data-field="vendor_name" data-sortable="false">Store Name</th>
                <th data-field="vendor_phone" data-sortable="true" data-formatter="formatPhoneNumber">Phone</th>
                <th data-field="street_address" data-sortable="true">Street</th>
                <th data-field="city_name" data-sortable="false">City</th>
                <th data-field="zip_code" data-sortable="true">Zip</th>
                <th data-field="county_name" data-sortable="true">County</th>
            </tr>
            </thead>

            </table>
        </div>
    </div>
</div>