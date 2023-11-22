<?php
    //-- CONNECT TO DB AND RETRIEVE DATA 
    require_once 'dbh.inc.php';

    // GET UID IF LOGGED IN FOR PRESENTING VISITED PRODUCTS IF NOT LOGGED IN USE DUMMY ID 0
    if(isset($_SESSION['userid'])) {
        $uid = $_SESSION['userid'];
    } else {
        $uid = 0;
    }
   
    //-- FETCH FEATURED PRODUCTS FROM DB 
    $products = "";
    $productheader = "AANBEVOLEN PRODUCTEN";
    $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE id IN (SELECT productID FROM nerdy_gadgets_start.productvisited WHERE uid = " . $uid . ") UNION (SELECT * FROM nerdy_gadgets_start.product ORDER BY RAND() LIMIT 4) ORDER BY RAND() LIMIT 4;";    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products = $products . "
            <div class='col'>
                <div class='card h-100'>
                    <div class='card-header text-capitalize text-center'>" . $row["category"] . "</div>
                    <img src='product_images/" . $row["image"] . ".jpg' class='card-img-top mt-3 p-3' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title mk-truncate-2' text-center>" . $row["name"] . "</h5> 
                        <div class=''><p class='mk-truncate-2 text-center'>" . $row["description"] . "</p></div>               
                    </div>
                    <div class='card-footer p-0'>
                        <div class='row'>
                            <div class='col-sm pt-3 text-center'>€ " . $row["price"] . "</div>
                            <div class='col-sm border-start p-2 text-center'>
                                <small class='text-muted'>
                                    <a href='product.php?id=" . $row["id"] . "' class='btn btn-secondary'>Bekijk</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>";}            
    } else {
        $productheader = "NO FEATURED PRODUCTS";
    }
    $conn->close();
?>