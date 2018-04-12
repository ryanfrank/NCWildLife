<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 10/2/17
 * Time: 5:50 PM
 */
?>
<?php $data = json_encode($rehabbers->result()); ?>
<script>

   $('#rehabberTable').bootstrapTable({
       height: getHeight(),
       data: <?php echo $data ?>,
        columns: [
           /* {
                checkbox: true
            },*/
            {
                /*sortable: true,*/
                field: 'rehabber_name',
                title: 'Rehabber Name'
            },
            {
                field: 'rehabber_email',
                title: 'Rehabber Email'
            },
            {
                field: 'rehabber_phone',
                title: 'Rehabber Phone'
            },
            {
                field: 'rehabber_state',
                title: 'Rehabber State'
            },
            {
                field: 'rehabber_county',
                title: 'Rehabber County'
            },
            {
                field: 'rehabber_zip',
                title: 'Rehabber Zip'
            },
            {
                field: 'rehabber_active',
                title: 'Rehabber Active'
            },
            {
                field: 'rehabber_notes',
                title: 'Rehabber Notes'
            }
        ]
    });

   function responseHandler(res) {
       $.each(res.rows, function (i, row) {
           row.state = $.inArray(row.id, selections) !== -1;
       });
       return res;
   }

   function getHeight() {
       return $(window).height() - $('h1').outerHeight(true);
   }

</script>

<table id="rehabberTable"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       data-show-export="false"
       data-detail-view="false"
       data-minimum-count-columns="2"
       data-show-pagination-switch="true"
       data-pagination="true"
       data-id-field="rehabber_name"
       data-page-list="[10, 25, 50, 100, ALL]"
       data-show-footer="false"
       data-response-handler="responseHandler">
</table>
