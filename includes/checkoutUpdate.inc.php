<?php
session_start();

//TEST IF CALLED FROM DECREASE ARTICLE FROM CHECKOUT
if (isset($_GET["decr"])) {
    // SUBTRACT 1 PIECE FROM ARTICLE IN SESSION
    if ($_SESSION['cart'][$_GET["decr"]] == 1) {
        header("location: ../checkout.php");
        exit;
    } else {
        $_SESSION['cart'][$_GET["decr"]] = $_SESSION['cart'][$_GET["decr"]] - '1';
        header("location: ../checkout.php");
        exit;
        // echo print_r($_SESSION['cart']) . "<br><br>";
        // exit;
    }
}

//TEST IF CALLED FROM INCREASE ARTICLE FROM CHECKOUT
if (isset($_GET["incr"])) {
    // ADD 1 PIECE FROM ARTICLE IN SESSION
    $_SESSION['cart'][$_GET["incr"]] = $_SESSION['cart'][$_GET["incr"]] + '1';
    header("location: ../checkout.php");
    exit;
}

//TEST IF CALLED FROM DELETE ARTICLE FROM CHECKOUT
if (isset($_GET["del"])) {
    // REMOVE ITEM FROM SESSION
   unset($_SESSION['cart'][$_GET["del"]]);
   header("location: ../checkout.php");
   exit;
}

