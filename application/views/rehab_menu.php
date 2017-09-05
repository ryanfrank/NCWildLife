<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/2/17
 * Time: 1:58 PM
 */
?>
<div class="row ml-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">NC Wild Life Rehab</a>
        <div class="collapse navbar-collapse" id="ncwlNavigation">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0)" onclick="window.location.reload(false);">Home <span class="sr-only">(Current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Activity / Intake</a>
                    <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="$(content).load('Intake/add_good_samaritan')">Add Good Samaritan</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Intake/intake_animal')">Intake Animal</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Information</a>
                    <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="">Activity Calendar</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="">Events / Appearances</a>
                    </div>
                </li>
                <?php if ( $this->ion_auth->in_group('volunteer') ){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Volunteer</a>
                        <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Volunteer/schedule')">Volunteer Calendar</a>
                        </div>
                    </li>
                <?php } ?>
                <?php if ( $this->ion_auth->logged_in() ){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Charts</a>
                        <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/squirrelChart')">Squirrel Feeding Chart</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/opossumChart')">Opossum Feeding Chart</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/bunnyChart')">Bunny Feeding Chart</a>
                        </div>
                    </li>
                <?php } ?>
                <?php if ($this->ion_auth->is_admin()){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
                        <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Admin/add_rehabber')">Add Rehabber</a>
                            <a class="dropdown-item" href="#">Add Locations</a>
                            <a class="dropdown-item" href="#">Add Cages</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>