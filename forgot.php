<?php 
include("include.php");
if ($login->isUserLoggedIn() == false) {
    include("views/forgot-password.php");
} else{
    echo("YOU ARE LOGGED IN YOU HAVE CLEARLY NOT FORGOTTEN A PASSWORD");
}
