<?php

// FRONTSIDE

function covermanager_show()
{
    return Inc\Controllers\CoverController::show();
}

function covermanager_url_background($folder, $image)
{
    return maguk_theme_url( basename($folder) ) . '/' . $image;
}