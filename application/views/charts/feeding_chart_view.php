<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/31/17
 * Time: 7:26 PM
 */

$num_entries = $result->num_rows();

if ( $num_entries >= 1 ){
    ?>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("feedingData");
            tr = table.getElementsByTagName("tr");
            filterCol = 1; // Adjust the column to filter 0=A 1=B...etc

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[filterCol];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <div id="feedingTable">
        <div class="row col-2 mb-2">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Specify weight (g)" />
        </div>
        <div class="row col-8">
            <table class="table table-bordered table-striped" id="feedingData">
                <tr>
                    <th>Species Type</th>
                    <th>Weight</th>
                    <th>CC</th>
                    <th>Freequency</th>
                    <th>Description</th>
                </tr>
                <?php
                foreach ( $result->result() as $chart ) {
                    ?>
                    <tr>
                        <td><?php echo $chart->species_name; ?></td>
                        <td><?php echo $chart->feeding_weight; ?></td>
                        <td><?php echo $chart->feeding_cc; ?></td>
                        <td><?php echo $chart->freequency; ?></td>
                        <td><?php echo $chart->freequency_description; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

<?php }
else {
    echo "Sorry, no information found...";
}
?>