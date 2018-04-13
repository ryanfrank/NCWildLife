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
    var table = $('#rehabberTable'), subTable = $('#subTable');
    table.bootstrapTable({
       height: getHeight(),
       data: <?php echo $data ?>,
        columns: [
           /* {
                checkbox: true
            },*/
            {
                sortable: true,
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
                sortable: true,
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

    function detailFormatter(index, row) {
        var html = [], itteration = 1, count = Object.keys(row).length;
        html.push('<table id="subTable" data-toggle="table"><tbody>');
            html.push('<tr>');
                html.push('<td>City: ' + Object.values(row)[4] + '</td><td>Licensed: '+ Object.values(row)[9] + '</td><td>Updated: ' + Object.values(row)[15] + '</td><td>Created: ' + Object.values(row)[14] + '</td>');
            html.push('</tr>');
        html.push('<tr>');
            html.push('<td colspan="2">Affiliations: ' + Object.values(row)[12] + '</td><td colspan="2">Other Contacts: ' + Object.values(row)[13] + '</td>');
        html.push('</tr>');
        html.push('<tr>');
            html.push('<td colspan="4">Additional Notes: ' + Object.values(row)[11] + '</td>');
        html.push('</tr>');
        html.push('</tbody></table>');
        return html.join('');
    }
</script>

<table id="rehabberTable"
       data-search="true"
       <?php if ( $this->ion_auth->logged_in() ) { echo "data-detail-view=\"true\""; } ?>
       <?php if ( $this->ion_auth->logged_in() ) { echo "data-detail-formatter=\"detailFormatter\""; } ?>
       data-striped="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       data-show-export="false"
       data-minimum-count-columns="2"
       data-show-pagination-switch="true"
       data-pagination="true"
       data-id-field="rehabber_name"
       data-page-list="[10, 25, 50, 100, ALL]"
       data-show-footer="false"
       >
</table>
