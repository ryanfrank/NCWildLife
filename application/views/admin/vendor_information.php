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
    var contactElements = [];
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
    function makeEditable(value, element, titleText, key){
        var editableClass = "myEditTable_" + key;
        if ( !contactElements.includes('.' + editableClass) ) { contactElements.push('.'+ editableClass); }
        if ( titleText === "Comments") { dataType = "wysihtml5"}
        else { dataType = "text"; }
        if ( titleText === "Phone Number" ) {value = formatPhoneNumber(value);}
        link = '<a href="#" data-type="'+dataType+'" data-title="'+titleText+'" data-name="'+element+'" data-pk="'+ key +'" class="'+editableClass+'" >' + value + '</a>';
        return link;
    }
    function getVendorContact (index, row, $detail){
        contactElements = [];
        count = 1;
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
                    detailView: false,
                    data: result,
                    columns: [
                        { sortable: false, editable: true, field: 'v_first_name', formatter: function (value,row) {return makeEditable(value, "v_first_name", "First Name", row.vConID)}, title: "First Name" },
                        { sortable: false, editable: true, field: 'v_last_name', formatter: function (value,row) {return makeEditable(value, "v_last_name", "Last Name", row.vConID)}, title: "Last Name"},
                        { sortable: false, editable: true, field: 'v_phone', formatter: function (value,row) {return makeEditable(value, "v_phone", "Phone Number", row.vConID)}, title: 'Phone Number' },
                        { sortable: false, editable: true, field: 'contact_type', title: 'Contact Type' },
                        { sortable: false, editable: true, field: 'v_contact_position', formatter: function (value,row) {return makeEditable(value, "v_contact_position", "Position", row.vConID)},title: 'Position' },
                        { sortable: false, editable: true, field: 'v_contact_notes', formatter: function (value,row) {return makeEditable(value, "v_contact_notes", "Comments", row.vConID)}, title: 'Comments' },
                        { sortable: false, field: 'operate', title: '', align: 'center', valign: 'middle', clickToSelect: false,
                            formatter: function (value, row, index) {
                                return  '<button userID=\"'+row.vConID+'" class="btn btn-sm btn-primary updateButton_'+row.vConID+'">Update</button> ' +
                                        '<button class=\'btn btn-sm btn-danger\'>Delete</button>';
                            }
                        }
                    ]
                });
                if ( contactElements.length > 0 ){
                    contactElements.forEach(function(element){
                        $(document).ready(function() { $(element).editable({ mode: 'popup' }); });
                        $('.updateButton_' + count).click(function() {
                            var ID = $(this).attr('userID');
                            $(element).editable('submit', {
                                type: "POST",
                                ajaxOptions: {
                                    dataType: 'json'
                                },
                                url: "<?php echo base_url(); ?>" + "Admin/updateContact",
                                data: {
                                    "ID"    : ID,
                                    "type"  : 'updateContact'
                                },
                                success: function(result){
                                    if (result === "success") {
                                        jQuery("div#updateStatus").html('<div class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully updated contact</div>');
                                    }
                                }
                            });
                        });
                        count++;
                    });
                }
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
    <div id="updateStatus"></div>
    <div class="row align-center">
        <div id="myTable" class="col-10 align-center">
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
                   data-show-footer="false">
                <thead>
                    <tr>
                        <th hidden data-field="vendor_name" data-editable="true" data-sortable="false">Store Name</th>
                        <th hidden data-field="vendor_phone" data-sortable="true" data-formatter="formatPhoneNumber">Phone</th>
                        <th hidden data-field="street_address" data-sortable="true">Street</th>
                        <th hidden data-field="city_name" data-sortable="false">City</th>
                        <th hidden data-field="zip_code" data-sortable="true">Zip</th>
                        <th hidden data-field="county_name" data-sortable="true">County</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>