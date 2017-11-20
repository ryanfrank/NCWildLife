<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 10/2/17
 * Time: 5:50 PM
 */
?>

<script>
    (function () {
        var
            filters = {
                state: null,
                county: null
            };

        function updateFilters() {
            $('.rehabber-row').hide().filter(function () {
                var
                    self = $(this),
                    result = true; // not guilty until proven guilty
                Object.keys(filters).forEach(function (filter) {
                    if (filters[filter] && (filters[filter] != 'All') && (filters[filter] != 'Search County')) {
                        result = result && filters[filter] === self.data(filter);
                    }
                });
                return result;
            }).show();
        }
        function bindDropdownFilters() {
            Object.keys(filters).forEach(function (filterName) {
                $('#' + filterName + '-filter').on('change', function () {
                    if (filterName == 'county-filter'){
                        filters[filterName] = document.getElementById('county-filter');
                    }
                    else {
                        filters[filterName] = this.value;
                    }
                    updateFilters();
                });
            });
        }
        bindDropdownFilters();
    })();
</script>
<div class="row col-6 mt-2">
    <div class="form-group col-3">
        <select id="state-filter" class="form-control">
            <option>All</option>
            <?php foreach ($states->result() as $state):?>
                <option value="<?php echo $state->state_abbr; ?>"><?php echo $state->state_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-3">
        <input type="text" class="form-control" id="county-filter" placeholder="Search County (hit enter)" />
    </div>
</div>
<div class="row col-10">
    <table class="table table-bordered table-striped" id="rehabberData">
        <tr>
            <th>Rehabber Name</th>
            <th>Rehabber Email</th>
            <th>Rehabber Phone</th>
            <th>Rehabber City</th>
            <th>Rehabber State</th>
            <th>Rehabber County</th>
            <th>Notes</th>
        </tr>
        <?php
        foreach ( $rehabbers->result() as $rehabber ) {
            ?>
            <tr class="rehabber-row" data-state="<?php echo $rehabber->rehabber_state; ?>" data-county="<?php echo $rehabber->rehabber_county; ?>">
                <td><?php echo $rehabber->rehabber_name; ?></td>
                <td><a href="mailto: <?php echo $rehabber->rehabber_email; ?>"><?php echo $rehabber->rehabber_email; ?></a></td>
                <td>(<?php echo substr($rehabber->rehabber_phone, 0, -7) . ') ' . substr($rehabber->rehabber_phone, 3, -4) . '-' . substr($rehabber->rehabber_phone, -4, 4); ?></td>
                <td><?php echo $rehabber->rehabber_city; ?></td>
                <td><?php echo $rehabber->rehabber_state; ?></td>
                <td><?php echo $rehabber->rehabber_county; ?></td>
                <td><?php echo $rehabber->rehabber_notes; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>