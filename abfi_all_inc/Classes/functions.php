<?php
/**
 * Created by PhpStorm.
 * User: Atul
 * Date: 7/13/2017
 * Time: 9:14 PM
 */
function redirect_to($new_location) {
   header("Location: " . $new_location);
    exit;
}


function logged_in() {
    return isset($_SESSION['admin_id']);
}

function confirm_logged_in() {
    if (!logged_in()) {
        redirect_to("../admin_login.php");
    }
}

function confirm_slogged_in() {
    if (!logged_in()) {
        redirect_to("logout");
    }
}

function confirm_session_valid() {

    if(isset($_SESSION["username"]))
    {
        if((time() - $_SESSION['last_time']) > 10000) // Time in Seconds
        {
            header("location:logout-all.php");
        }
        else
        {
            $_SESSION['last_time'] = time();
            //header("location:manage_admins.php");
        }
    }
    else
    {
        header('Location:../final/reqpage/error.php');
    }
}

function confirm_session_svalid() {

    if(isset($_SESSION["username"]))
    {
        if((time() - $_SESSION['last_time']) > 10000) // Time in Seconds
        {
            header("location:logout.php");
        }
        else
        {
            $_SESSION['last_time'] = time();
            //header("location:manage_admins.php");
        }
    }
    else
    {
        header('Location:logout.php');
    }
}