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
    $('#productTypes').off('change');
    $('#productTypes').change(function(){
        table.bootstrapTable('destroy');
        var e = document.getElementById("productTypes");
        var productTypesID = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Volunteer/getVendor",
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
    $('#vendorName').off('change');
    $('#vendorName').change(function(){
        table.bootstrapTable('destroy');
        var e = document.getElementById("vendorName");
        var vendorNameID = e.options[e.selectedIndex].value;
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Volunteer/getVendor",
            dataType: 'json',
            data: {
                "type"  : 'vendorLookup',
                "nameID": vendorNameID
            },
            success: function(row) {
                table.bootstrapTable({
                    height: getHeight(),
                    striped: false,
                    cache: false,
                    showToggle: true,
                    showPaginationSwitch: true,
                    smartDisplay: true,
                    iconsPrefix: 'fa',
                    search: true,
                    showColumns: true,
                    showRefresh: true,
                    pagination: true,
                    pageList: "[10, 25, 50, 100, ALL]",
                    data: row,
                    detailView: true,
                    columns: [
                        { sortable: false, field: 'vendor_name', title: 'Name' },
                        { sortable: true, field: 'vendor_phone',  formatter: function (value) { return formatPhoneNumber(value); }, title: 'Phone' },
                        { sortable: true, field: 'street_address',  title: 'Street' },
                        { sortable: true, field: 'city_name',  title: 'City' },
                        { sortable: true, field: 'zip_code',  title: 'Zip' },
                        { sortable: true, field: 'county_name',  title: 'County'},
                        { sortable: false, field: 'operate', title: '', align: 'center', valign: 'middle', clickToSelect: false,
                            formatter: function (value, row, index) {
                                return  '<a id="'+ index +'_Table"  data-storeID="'+row.vInfoID+'" data-storeName="' + row.vendor_name +'" data-storeAddress="'+row.street_address+'" data-storeCity="'+row.city_name+'" title="Add Contact" data-placement="top" style="color: black" class="fas fa-plus-square fa-lg"></a> '
                            }
                        }
                    ],
                    onExpandRow: function(index, row, $detail) {
                        contactElements = [];
                        getVendorContact(index, row, $detail);
                        <?php
                        if ( $this->ion_auth->is_admin() ) { ?>
                            document.getElementById(index + '_Table').style.color = "green";
                            $('#' + index + '_Table').attr({ 'data-toggle': 'modal', 'href': '#addContactModal'});
                            $('#addContactModal').on('show.bs.modal', function (event) {
                                var button = $(event.relatedTarget);
                                var storeName = button.data('storename');
                                var streetAddress = button.data('storeaddress');
                                var storeCity = button.data('storecity');
                                var storeID = button.data('storeid');
                                var modal = $(this);
                                modal.find('.modal-title').text('New contact for ' + storeName + ' at ' + streetAddress + ' in ' + storeCity);
                                $('#addContactForm').off('submit');
                                $('#addContactForm').submit( function(event){
                                   event.preventDefault();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>" + "Volunteer/addContact",
                                        dataType: 'json',
                                        data: {
                                            "first_Name"    : $('#c_FirstName').val(),
                                            "last_Name"     : $('#c_LastName').val(),
                                            "storeID"       : storeID,
                                            "storeCity"     : storeCity,
                                            "phoneNumber"   : formatPhoneNumber($('#phoneNumber').val()),
                                            "phoneType"     : $('#phoneType').val(),
                                            "position"      : $('#positionName').val(),
                                            "notes"         : $('#contactNotes').val()
                                        },
                                        success : function(result) {
                                            modal.modal('toggle');
                                            document.getElementById("c_FirstName").value = null;
                                            document.getElementById("c_LastName").value = null;
                                            document.getElementById("phoneNumber").value = "(xxx) xxx-xxxx";
                                            document.getElementById("phoneType").value = null;
                                            document.getElementById("contactNotes").value = null;
                                            document.getElementById("positionName").value = null;
                                            if (result === "success") {
                                                jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully added contact</div>');
                                                $('#success-alert').fadeOut(2500);
                                            }
                                        }
                                    });
                                });

                            });
                        <?php } ?>
                    },
                    onCollapseRow: function(index) {
                        $('#store_' + index + '_table').bootstrapTable('destroy');
                        document.getElementById(index + '_Table').style.color = "black";
                        $('#' + index + '_Table').attr({ 'data-toggle': null, 'href': null});
                        $('#addContactModal').modal('dispose');
                    }
                });
            }
        });
    });
    function makeEditable(myValue, element, titleText, myKey){
        var option = {"data-type": null, "data-title": null, "data-name": null, "data-pk": null, "data-source": null, "class": null, "value": null};
        var link = '<a href="#" ';
        for (var key in option){
            if ( key === "data-type" && option[key] === null ) {
                if ( titleText === "Comments") { option[key] = "wysihtml5";}
                else if ( titleText === "Contact Type") { option[key] = "select";}
                else {option[key] = "text";}
                link = link + key + '="' + option[key] + '" ';
            }
            else if ( key === "data-title" && option[key] === null ) {
                option[key] = titleText;
                link = link + key + '="' + option[key] + '" ';
            }
            else if ( key === "data-name" && option[key] === null ) {
                option[key] = element;
                link = link + key + '="' + option[key] + '" ';
            }
            else if ( key === "data-pk" && option[key] === null ) {
                option[key] = myKey;
                link = link + key + '="' + option[key] + '" ';
            }
            else if ( key === "data-source" && option['data-title'] === "Contact Type" ) {
                option[key] = "/groups";
                link = link + key + '="' + option[key] + '" ';
            }
            else if ( key === "class" && option[key] === null ) {
                option[key] = "myEditTable_" + myKey;
                var classEntry = '.'+ option[key];
                if (!contactElements.includes(classEntry) ) { contactElements.push('.' + option[key]); }
                link = link + key + '="' + option[key] + '"> ';
            }
            else if ( key === "value" && option[key] === null ) {
                if ( element === "v_phone" ){ myValue = formatPhoneNumber(myValue); }
                option[key] = myValue;
                link = link + option[key] + '</a>';
            }
        }
        return link;
    }
    function getVendorContact (index, row, $detail){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Volunteer/getVendor",
            dataType: 'json',
            data: {
                "vInfoID": row['vInfoID'],
                "type"  : 'vendorInformation'
            },
            success: function(row){
                storeIndex = index;
                $detail.html('<table id="store_' + index + '_table"><tbody></tbody></table>').find('table').bootstrapTable({
                    height: getHeight(),
                    striped: false,
                    cache: false,
                    detailView: false,
                    pageList: "[10, 25, 50, 100, ALL]",
                    data: row,
                    columns: [
                        { sortable: false, editable: true, field: 'v_first_name', formatter: function (value,row) { return makeEditable(value, "v_first_name", "First Name", row.vConID)}, title: "First Name" },
                        { sortable: false, editable: true, field: 'v_last_name', formatter: function (value,row) {return makeEditable(value, "v_last_name", "Last Name", row.vConID)}, title: "Last Name"},
                        { sortable: false, editable: true, field: 'v_phone', formatter: function (value,row) {return makeEditable(value, "v_phone", "Phone Number", row.vConID)}, title: 'Phone Number' },
                        { sortable: false, editable: true, field: 'contact_type', formatter: function (value,row) {return makeEditable(value, "contact_type", "Contact Type", row.vConID)}, title: 'Contact Type' },
                        { sortable: false, editable: true, field: 'v_contact_position', formatter: function (value,row) {return makeEditable(value, "v_contact_position", "Position", row.vConID)},title: 'Position' },
                        { sortable: false, editable: true, field: 'v_contact_notes', formatter: function (value,row) {return makeEditable(value, "v_contact_notes", "Comments", row.vConID)}, title: 'Comments' },
                        { sortable: false, field: 'operate', title: '', align: 'center', valign: 'middle', clickToSelect: false,
                            formatter: function (value, row, index) {
                            <?php if ( $this->ion_auth->is_admin() ) { ?>
                                return  '<i data-toggle="tooltip" id="updateEntry'+row.vConID+'" title="Update Contact" data-placement="top" style="color: green"  data-userID="'+row.vConID+'" class="fas fa-check-circle fa-lg"></i> ' +
                                        '<i data-toggle="tooltip" id="deleteEntry'+row.vConID+'" title="Delete Contact" data-placement="top" style="color: red" userID=\"'+row.vConID+'" class="ml-3 fas fa-minus-square fa-lg"></i>';
                            <?php } ?>
                            }
                        }
                    ]
                });
                <?php if ( $this->ion_auth->is_admin() ) { ?>
                    if ( contactElements.length > 0 ){
                        contactElements.forEach(function(element){
                            $(document).ready(function() { $(element).editable({ mode: 'popup' }); $('[data-toggle="tooltip"]').tooltip() });
                            var res = element.split("_");  // Updated to look at contactElements rather than the row elements as they are not present here.
                            contactID = res[1];
                            $('#updateEntry' + contactID).off('click'); // Added to prevent compounding Ajax submissions - releases the binding of the button to previous actions
                            $('#updateEntry' + contactID).click(function() {
                                contactID = res[1]; // setting again as the original set carries last element ID or something wrong :).
                                $(element).editable('submit', {
                                    type: "POST",
                                    ajaxOptions: {
                                        dataType: 'json'
                                    },
                                    url: "<?php echo base_url(); ?>" + "Volunteer/updateContact",
                                    data: {
                                        "ID"    : contactID,
                                        "type"  : 'updateContact'
                                    },
                                    success: function(result){
                                        if (result === "success") {
                                            jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully updated contact</div>');
                                            $('#success-alert').fadeOut(2500);
                                        }
                                        else if (result === "error") {
                                            jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Unable to update contact, database returned error condition</div>');
                                            $('#error-alert').fadeOut(2500);
                                        }
                                    }
                                });
                            });
                            $('#deleteEntry' + contactID).off('click'); // Added to prevent compounding Ajax submissions - releases the binding of the button to previous actions
                            $('#deleteEntry' + contactID).click(function() {
                                contactID = res[1]; // setting again as the original set carries last element ID or something wrong :).
                                $(element).editable('submit', {
                                    type: "POST",
                                    ajaxOptions: {
                                        dataType: 'json'
                                    },
                                    url: "<?php echo base_url(); ?>" + "Volunteer/deleteContact",
                                    data: {
                                        "ID"    : contactID
                                    },
                                    success: function(result){
                                        if (result === "success") {
                                            jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully deleted contact</div>');
                                            $('#success-alert').fadeOut(2500);
                                        }
                                        else if (result === "error") {
                                            jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Unable to delete contact, database returned error condition</div>');
                                            $('#error-alert').fadeOut(2500);
                                        }
                                    }
                                });
                            });
                        });
                    }
                <?php } ?>
            }
        });
    }
</script>
<div class="container-fluid col-12">
    <div class="row col-10" id="contactStatus"></div>
    <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container modal-header text-center align-content-center align-center">
                    <h5 class="ml-3 col-11 modal-title text-muted text-center" id="addContactModalLabel">Add new conatact for vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="addContactForm" data-toggle="validator">
                        <div class="form-group">
                            <label for="c_FirstName">First Name</label>
                            <input id="c_FirstName" type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="c_FirstName">Last Name</label>
                            <input type="text" class="form-control" id="c_LastName" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber" placeholder="(xxx) xxx-xxxx" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneType">Phone Type</label>
                            <select class="form-control" id="phoneType" required>
                                <option value="1">Mobile</option>
                                <option value="2">Office</option>
                                <option value="3">Home</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="positionName">Position at vendor</label>
                            <input type="text" class="form-control" id="positionName" placeholder="e.g. Manager, Product Manager, etc" required>
                        </div>
                        <div class="form-group">
                            <label for="contactNotes">Notes</label>
                            <input type="text" class="form-control" id="contactNotes" placeholder="In office m-f 8-5">
                        </div>
                        <button type="submit" id="addContactButton" class="btn btn-success pull-right">Submit</button>
                        <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
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
    <div id="myTable" class="col-10 align-center">
        <table id="productTable"></table>
    </div>
</div>