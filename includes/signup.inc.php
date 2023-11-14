<?php

// GET DATA FROM SIGNUP PAGE
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $sname = $_POST["sname"];
    $hnmbr = $_POST["hnmbr"];
    $pcode = $_POST["pcode"];
    $city = $_POST["city"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdr = $_POST["pwdr"];

    // --------------------------------------------------------------
    // IMPORT FILES FOR FURTHER PROCESSING
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // --------------------------------------------------------------
    // CALL FUNCTIONS FROM FUNCTIONS.PHP FOR ERROR TESTING

    // CALLED FUNCTION FROM FUNCTIONS.PHP FOR TESTING EMPTY FIELDS, REDIRECT (WITH ERROR TEXT IN URL) USER AND STOP FURTHER EXECUTION
    if (emptyInputSignup($fname,$lname,$sname,$hnmbr,$pcode,$city,$email,$pwd,$pwdr) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    // CALLED FUNCTION FROM FUNCTIONS.PHP FOR TESTING VALID EMAIL, REDIRECT (WITH ERROR TEXT IN URL) USER AND STOP FURTHER EXECUTION
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    // CALLED FUNCTION FROM FUNCTIONS.PHP FOR TESTING BOTH PASSWORDS MATCH, REDIRECT (WITH ERROR TEXT IN URL) USER AND STOP FURTHER EXECUTION
    if (pwdMatch($pwd, $pwdr) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    // CALLED FUNCTION FROM FUNCTIONS.PHP FOR TESTING IF EMAIL IS ALREADY TAKEN, REDIRECT (WITH ERROR TEXT IN URL) USER AND STOP FURTHER EXECUTION
    if (emailExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    // IF PASSED ALL TEST THEN ENROLL NEW USER
    createUser($conn,$email,$pwd,$fname,$lname,$sname,$hnmbr,$pcode,$city);
    // --------------------------------------------------------------

} else {
    // REDIRECT IS USER LANDED ON THIS PAGE WITHOUT SIGNING UP
    header("location: ../signup.php");
}