<?php

require_once 'dbh.inc.php';
session_start();                                                        //TO KEEP TRACK OF SESSION IT NEEDS TO BE SET AT EACH PAGE
// print_r($_SESSION['cart']);
// exit;

if (isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $sql = 'SELECT * FROM nerdy_gadgets_start.product WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);    
    $product = $stmt->fetch(PDO::FETCH_ASSOC);                          // STORE DB RESULT IN ARRAYY 
    if ($product && $quantity > 0) {                                    // IF PRODUCT EXISTS IN DB THEN CONTINUE        
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {  // IF THE CART SESSION (ARRAY) ALREADY EXISTS:
            if (array_key_exists($product_id, $_SESSION['cart'])) {     // PRODUCT ALREADY EXISTS IN CART SESSION; UPDATE THE QUANTITY
                $_SESSION['cart'][$product_id] += $quantity;            
            } else {                                                    // PRODUCT DOES NOT ALREADY EXISTS IN CART SESSION; ADD IT
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {                                                        // IF THE CART SESSION (ARRAY) DOES NOT ALREADY EXISTS:
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    header('location: ../index.php?page=cart');
    
    exit;
}

header("location: ../product.php?id=" . $id);

// TO PREVENT USER INJECTING NON-EXISTENT PRODUCT-IDS BY CHECKING IF IT EXISTS IN THE DB
// A SESSION LAST UNTIL THE USER CLOSES THE BROWSER
// A SESSION IS JUST AN ARRAY BEING PASSED OVER MULTIPLE PAGES




