<?php
    //-- CONNECT TO DB AND RETRIEVE DATA 
    require_once 'dbh.inc.php';
   
    //-- FETCH FEATURED PRODUCTS FROM DB 
    $products = "";
    $productheader = "AANBEVOLEN PRODUCTEN";
    $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE id IN (7,15,24,53) ORDER BY id ASC";
    $result = $conn->query($sql);
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