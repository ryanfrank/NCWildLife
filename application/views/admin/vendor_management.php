<script>
    function rowFormatter(row, index) {
        if ( ! row.operate ){
            return  '<a data-placement="top" style="color: black" class="fas fa-plus-square fa-lg" id="'+row.vendor_id + '_' +index+'"  data-storeID="'+row.vendor_id+'"></a>'
        }
        else {
            return row.operate;
        }
    }
    function checkInput(input,element,product,type){
        if ( type === 'vendorAdd'){
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
        else if ( type === 'locationAdd' ){
            if ( product + '_street' !== null && product + '_zip' !== null && product + '_phone' !== null && product + '_city' !== null ){
                e = document.getElementById(product + '_add');
                e.style.color = "green";
                myType = 'addLocation';
                e.setAttribute("onclick", 'addVendorLocation(this,"'+product+'",myType);');
            }
            else {
                alert('Please supply all information to submit!');
            }
        }
    }
    function getLocation(param,index){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Product/get/cityZip",
            dataType: "json",
            data: { "zip": param.value },
            success: function (result) {
                if ( result ){
                    myID = vendorId + '_' + index;
                    document.getElementById(myID + '_city').setAttribute('value', result.city_name);
                    document.getElementById(myID + '_state').setAttribute('value', result.state_abbr);
                    document.getElementById(myID + '_county').setAttribute('value', result.county_name);
                    document.getElementById(myID + '_zip').setAttribute('zip-id', result.city_zip_ID);
                }
                else {
                    alert('Zip code not found or invalid');
                }
            }
        });
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
    function addVendorLocation(i,index,type = false) {
        if ( type === false ){
            var $row = $('table#store_' +index+'_table').children('tbody').children('tr:not(".no-records-found")');
            locCounter = $row.length;
            myType = 'locationAdd';
            myElement = vendorId + '_' + locCounter;
            $('#store_' +index+'_table').bootstrapTable('insertRow', {
                index: 0,
                row: {  street_address: '<input type="text" id="'+ myElement+'_street" onchange="checkInput(this.value,this.id,myElement,myType)" placeholder="street address" />',
                        vendor_phone: '<input type="text" id="'+ myElement+'_phone" placeholder="phone number" />',
                        city_name: '<input type="text" size="10" id="'+ myElement +'_city" disabled />',
                        zip_code: '<input type="text" id="'+ myElement+'_zip" placeholder="code" onchange="getLocation(this,'+locCounter+');" />',
                        county_name: '<input type="text" size="10" id="'+ myElement+'_county" disabled />',
                        state_abbr: '<input type="text" size="2" id="'+ myElement+'_state" disabled />',
                        operate: '<a data-placement="top" style="color: black" class="fas fa-check-square fa-lg" id="'+myElement+'_add"></a>'
                }
            });
        }
        else if ( type === 'addLocation' ){
            z = document.getElementById(vendorId + '_' + locCounter + '_zip').getAttribute('zip-id');
            s = document.getElementById(vendorId + '_' + locCounter + '_street').value;
            p = document.getElementById(vendorId + '_' + locCounter + '_phone').value;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Product/add/" + type,
                dataType: "json",
                data: { "street": s, "phone": p, "zip": z, "vendor": vendorId },
                success: function (result) {
                    if ( result === "success" ){
                        e = document.getElementById(myElement + '_add');
                        e.style.color = "black";
                        e.removeAttribute("onclick");
                        jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 fade show" role="alert">Added vendor location</div>');
                        $('#success-alert').fadeOut(3000);
                    }
                    else if ( result === "failAdd"){
                        jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 fade show" role="alert">Failed to add vendor location</div>');
                        $('#error-alert').fadeOut(5000);
                    }
                }
            });
        }
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
                var locCounter = 0;
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
                    onExpandRow: function(index, row, $detail) {
                        if ( row.vendor_name.length <= 32 ){
                            infoTable = 'store_' + index + '_table';
                            vendorId = row.vendor_id;
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>" + "Product/vendorLocations",
                                dataType: "json",
                                data: { "ID": vendorId },
                                success: function (result) {
                                    e = document.getElementById(row.vendor_id + '_' + index);
                                    e.style.color = "green";
                                    e.setAttribute("id", row.vendor_id + '_' + index);
                                    e.setAttribute("onclick", 'addVendorLocation(this,'+index+',type=false);');
                                    $detail.html('<table id="'+infoTable+'"><tbody></tbody></table>').find('#'+infoTable).bootstrapTable({
                                        striped: false,
                                        cache: false,
                                        detailView: false,
                                        pageList: "[10, 25, 50, 100, ALL]",
                                        data: result,
                                        columns: [
                                            { sortable: false, field: 'street_address', title: "Street Address" },
                                            { sortable: false, field: 'vendor_phone', formatter: function(value) {return formatPhoneNumber(value); },title: "Phone Number"},
                                            { sortable: false, field: 'city_name', title: 'City' },
                                            { sortable: false, field: 'zip_code', title: 'Zip' },
                                            { sortable: false, field: 'county_name', title: 'County' },
                                            { sortable: false, field: 'state_abbr', title: 'State' },
                                            { sortable: false, filed: 'operate', align: 'center', valign: 'middle', title: 'Add/Delete', 
                                                formatter: function (value, row, index, field) {
                                                    return rowFormatter(row,index);
                                                }
                                            }
                                        ]
                                    });
                                }
                            });
                        }
                    },
                    onCollapseRow: function(index,row, $detail) {
                        if ( row.vendor_name.length <= 32 ){
                            e = document.getElementById(row.vendor_id+'_'+index);
                            e.style.color = "black";
                            e.removeAttribute("href");
                            $detail.html('<table id="'+infoTable+'"><tbody></tbody></table>').find('table').bootstrapTable('destroy');
                        }
                    }
                });
                table.show();
                var counter = 0;
                myType = 'vendorAdd';
                $('#vendorAdd').off('click');
                $('#vendorAdd').on('click', function (e) {
                    table.bootstrapTable('insertRow', {
                        index: counter,
                        row: {  vendor_name: '<input type="text" id="'+ productID +'_'+counter+'" placeholder="New Vendor Name '+counter+'" oninput="checkInput(this.value, this.id, productID,myType)" />',
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