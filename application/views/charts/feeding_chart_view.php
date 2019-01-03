<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/31/17
 * Time: 7:26 PM
 */

    $num_entries = sizeOf($results->result());
    $data = json_encode($results->result());

    if ( $num_entries >= 1 ){
?>
        <script type="application/javascript">
            function getHeight() {
                return $(window).height() - $('h1').outerHeight(true);
            }
            var table = $('#chartTable');
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
                detailView: false,
                data: <?php echo $data ?>,
                columns: [
                    {sortable: true, field: 'feeding_weight', title: 'Feeding Weight'},
                    {field: 'feeding_cc', title: 'Feeding Qty (cc)'},
                    {field: 'freequency', title: 'Feeding Freequency'},
                    {sortable: true, field: 'freequency_description', title: 'Freequency Description'}
                ]
            });
        </script>
        <div class="row col-12">
            <p class="h2"><?php echo $type . " "; ?> Feeding Chart</p>
        </div>
        <div class="row align-center col-12">
            <div id="divTable" class="col-10 align-center">
                <table id="chartTable"></table>
            </div>
        </div>

<?php } ?>