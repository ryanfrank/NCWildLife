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
            //{
            //     radio: true
            // },
            {
                sortable: true,
                field: 'rehabber_name',
                title: 'Name'
            },
            {
                field: 'rehabber_phone',
                title: 'Phone'
            },
            {
                field: 'rehabber_state',
                title: 'State'
            },
            {
                sortable: true,
                field: 'rehabber_county',
                title: 'County'
            },
            {
                field: 'rehabber_active',
                title: 'Active'
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
            html.push('<td colspan="2">Additional Notes: ' + Object.values(row)[11] + '</td><td colspan="2">Rehabber Email: ' + Object.values(row)[3] + '</td>');
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
