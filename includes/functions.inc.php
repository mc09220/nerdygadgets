<?php

function emptyInputSignup($fname,$lname,$sname,$hnmbr,$pcode,$city,$email,$pwd,$pwdr) {
    $result;
    if (empty($fname) || empty($lname) || empty($sname) || empty($hnmbr) || empty($pcode) || empty($city) || empty($email) || empty($pwd) || empty($pwdr)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // PHP BUILDIN EMAIL TESTER
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdr) {
    $result;
    if ($pwd !== $pwdr) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM user WHERE email = ?;";
    // PREVENT USER INJECTION BY USING THE FOLLOWING WAY (PREPARE)
    // THE REPLACEMENT QUESTION MARK IS BUILDIN SECURITY SYSTEM. 
    // THE QUERY IS SENT TO THE DB AND THE VALUE FOR THE REPLACEMENT CHARACTER IS SENT AFTERWARDS
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    // THE s IN THE SECOND CONDITION IS THE TYPE OF THE VALUE BEING PROVIDED (s = STRING)
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    // TEST IF THE DATA RETURNED (AS AN ASSOCIATE ARRAY = assoc) FROM THE DB MATCHES 
    // echo $sql;
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$email,$pwd,$fname,$lname,$sname,$hnmbr,$pcode,$city) {
    $sql = "INSERT INTO user (email,password,first_name,surname,street_name,apartment_nr,postal_code,city) VALUES (?,?,?,?,?,?,?,?);"; 
    // echo $sql;
    // PREVENT USER INJECTION BY USING THE FOLLOWING WAY (PREPARE)
    // THE REPLACEMENT QUESTION MARK IS BUILDIN SECURITY SYSTEM. 
    // THE QUERY IS SENT TO THE DB AND THE VALUE FOR THE REPLACEMENT CHARACTER IS SENT AFTERWARDS
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    // BUILDIN PHP AND CONTINUOUSLY BEING UPDATED SYSTEM OF ENCRYPTING PASSWORDS
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);
    // THE s IN THE SECOND CONDITION IS THE TYPE OF THE VALUE BEING PROVIDED (s = STRING, i = INTEGER)
    mysqli_stmt_bind_param($stmt, "ssssssss", $email,$hashedPwd,$fname,$lname,$sname,$hnmbr,$pcode,$city);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
}

function emptyInputSignin($email,$pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd){
    $emailExists = emailExists($conn, $email);
    if ($emailExists === false) {        
        header("location: ../signin.php?error=wrongsignin");
        exit();
    }

    $pwdhashed = $emailExists["password"];
    $checkpwd = password_verify($pwd, $pwdhashed); // PHP FUNCTION TO CHECK IF PROVIDED PASSWOR MATCHES THE HASHED PASSWORD FROM THE DB

    // if ($checkpwd === false) {
    // if (password_verify($pwd, $pwdhashed)) {
    //     header("location: ../signin.php?error=wrongsignin");
    //     exit();
    // } else if ($checkpwd === true) {
    //     session_start(); // PHP FUNCTION TO KEEP TRACK OF THE USERS SESSION (LOGGED-IN STATUS)
    //     $_SESSION["uid"] = $emailExists["email"];
    //     header("location: ../index.php");
    //     exit();
    // }

    if (password_verify($pwd, $pwdhashed)) {
        session_start(); // PHP FUNCTION TO KEEP TRACK OF THE USERS SESSION (LOGGED-IN STATUS)
        $_SESSION["uid"] = $emailExists["email"];
        header("location: ../index.php");
        exit();
    } else {
        header("location: ../signin.php?error=wrongsignin");
        exit();


    }
}