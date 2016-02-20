<?php
error_reporting(E_ALL);
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
$fb_name = $_POST['fb_name'];
$fb_id = $_POST['fb_id'];
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../index.php');
    } else {
        // Login failed 
        header('Location: ../login.php?error=1');
    }
} elseif ($fb_name){
    echo "gawd";
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
