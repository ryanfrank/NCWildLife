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
    var table = $('#vendorTable'), subTable = $('#subTable');
    $('#vendorTypes').change(function(){
        table.bootstrapTable('destroy');
        var e = document.getElementById("vendorTypes");
        var vendorTypesID = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Admin/getVendor",
            dataType: 'json',
            data: {
                "typeID": vendorTypesID,
                "type"  : 'vendorType'
            },
            success: function(result){
                $('#vendorName').empty();
                $('#vendorName').append('<option value="" ></option>');
                $.each(result.result, function(){
                    $('#vendorName').append('<option value="' + this['vendor_id'] + '" >'+this['vendor_name']+'</option>');
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
                    data: result,
                    columns: [
                            {
                                radio: true
                            },
                            {
                                sortable: true,
                                field: 'street_address',
                                title: 'Street'
                            },
                            {
                                field: 'vendor_zip',
                                title: 'Zip'
                            },
                            {
                                field: 'vendor_phone',
                                title: 'Phone'
                            }
                        ]
                    });
                }
        });
    });
</script>

<div id="vendorSelect">
    <div class="form-group col-3">
        <label for="vendorTypes" class="align-content-center">Vendor type</label>
        <select class="form-control" id="vendorTypes" required>
            <option></option>
            <?php foreach ($vendorType->result() as $row):?>
                <option value="<?php echo $row->vendorTypeID ?>"><?php echo $row->type_desc ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group col-2">
        <label for="vendorName" class="align-content-center">Vendor Name</label>
        <select class="form-control" id="vendorName" disabled>
            <option>Select Type First</option>
        </select>
    </div>
</div>
<div id="vendorListTable">
    <table id="vendorTable"
           data-search="true"
        <?php // if ( $this->ion_auth->logged_in() ) { echo "data-detail-view=\"true\""; } ?>
        <?php // if ( $this->ion_auth->logged_in() ) { echo "data-detail-formatter=\"detailFormatter\""; } ?>
           data-striped="true"
           data-show-refresh="true"
           data-show-toggle="true"
           data-show-columns="true"
           data-show-export="false"
           data-minimum-count-columns="2"
           data-show-pagination-switch="true"
           data-pagination="true"
           data-id-field="vendor_name"
           data-page-list="[10, 25, 50, 100, ALL]"
           data-show-footer="false"
    >
    </table>
</div>