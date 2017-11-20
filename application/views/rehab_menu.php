<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/2/17
 * Time: 1:58 PM
 */
?>
<div class="row ml-0 mr-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
        <a class="navbar-brand">NC Wildlife Rehab</a>
        <div class="collapse navbar-collapse" id="ncwlNavigation">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0)" onclick="window.location.reload(false);">Home <span class="sr-only">(Current)</span></a>
                </li>
                <?php if ( $this->ion_auth->in_group('volunteer') ){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Activity / Intake</a>
                    <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="$(content).load('Intake/add_good_samaritan')">Add Good Samaritan</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Intake/intake_animal')">Intake Animal</a>
                    </div>
                </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Information</a>
                    <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="$(content).load('Information/donations')">Donations</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Volunteer/schedule/event')">Events / Appearances</a>
                    </div>
                </li>
                <?php if ( $this->ion_auth->in_group('volunteer') ){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Volunteer</a>
                        <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Volunteer/schedule/volunteer')">Volunteer Calendar</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Rehab/locateRehabber')">Find Rehabber</a>
                        </div>
                    </li>
                <?php } ?>
                <?php if ( $this->ion_auth->logged_in() ){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarIntakeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Charts</a>
                        <div class="dropdown-menu" aria-labelledby="navbarIntakeDropdown">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/chart/Squirrel')">Squirrel Feeding Chart</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/chart/Opossum')">Opossum Feeding Chart</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Charts/chart/Bunny')">Bunny Feeding Chart</a>
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
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Admin/updateUser')">Update User</a>
                            <a class="dropdown-item" href="#">Delete User</a>
                            <a class="dropdown-item" href="#">Change User Password</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>