<?php
require_once 'dbh.inc.php';


$totalQuantity = 0;
$CheckoutItems = "";
$totalPrice = 0;
$shippingCosts = 20;
if (isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $itemID => $quantity) {
        $sql = 'SELECT * FROM nerdy_gadgets_start.product WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$itemID]);    
        $product = $stmt->fetch(PDO::FETCH_ASSOC); 
        if ($product && $quantity > 0) {
            $totalPrice = $totalPrice + ($product["price"] * $quantity);
            $totalPricePerArticle = $quantity * $product["price"];
            $totalQuantity += $quantity;
            $CheckoutItems = $CheckoutItems . "

            <div class='card mb-3'>
                <div class='card-body ps-1'>
                    <div class='d-flex justify-content-between'>
                        <div class='d-flex flex-row align-items-center ps-3'>
                            <div style='min-width:100px;'>                              
                              <a href='product.php?id=" . $product["id"] . "'>
                                <img src='product_images/" . $product["image"] . ".jpg' class='img-responsive rounded-3' alt='Shopping item' style='height: 75px;'>
                              </a>
                            </div>
                            <div class='ms-3'>
                              <h6 class='text-start mk-truncate-2'>" . $product["name"] . "</h6>
                            </div>                         
                        </div>
                        <div class='d-flex flex-row align-items-center'>
                            <div style='width: 120px;'>
                                <div class='container text-center'>
                                    <div class='row row-cols-1'>                      
                                        <div class='col btn-group' role='group' aria-label='Basic example'>
                                            <a type='button' class='btn btn-secondary btn-sm' href='includes/checkoutUpdate.inc.php?decr=" . $product["id"] . "'>-</a>
                                            <input type='number' value= " . $quantity . " min='1' max='99' onKeyDown='return false' class='mk-numberInput' />
                                            <a type='button' class='btn btn-secondary btn-sm' href='includes/checkoutUpdate.inc.php?incr=" . $product["id"] . "'>+</a>
                                        </div>
                                        <div class='col' style='width: 120px;'>
                                            <h5 class='mb-1 mt-1'>€ " . $totalPricePerArticle . "</h5>
                                            <a href='includes/checkoutUpdate.inc.php?del=" . $product["id"] . "'><i class='text-danger bi bi-x-circle'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }

}