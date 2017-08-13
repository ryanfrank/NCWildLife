<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 12:45 PM
 */
foreach ($species->result() as $row)
{
    echo $row->species_name;
}

?>
