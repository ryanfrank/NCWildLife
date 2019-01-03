<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/2/17
 * Time: 1:58 PM
 */
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">NC WildLife Rehab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ncwlrMenu" aria-controls="ncwlrMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="ncwlrMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0)" onclick="window.location.reload(false);">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="informationDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Information</a>
                <div class="dropdown-menu" aria-labelledby="informationDrop">
                    <a class="dropdown-item" href="javascript:void(0);" onclick="$(content).load('Information/donations')">Donations</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="$(content).load('Volunteer/schedule/event')">Events / Appearances</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
</nav>