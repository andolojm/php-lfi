<?php 
include("include.php");
if ($login->isUserLoggedIn() == true) {
    include("views/upload-claim.php");
} else{
    echo("This feature is intended for customers. Please log in.");
}
