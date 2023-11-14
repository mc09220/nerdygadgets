<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // CALLED FUNCTION FROM FUNCTIONS.PHP FOR TESTING EMPTY FIELDS, REDIRECT (WITH ERROR TEXT IN URL) USER AND STOP FURTHER EXECUTION
    if (emptyInputSignin($email,$pwd) !== false) {
        header("location: ../signin.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $pwd);
    
} else {
    // REDIRECT IS USER LANDED ON THIS PAGE WITHOUT SIGNING UP
    header("location: ../signin.php");
    exit();
}