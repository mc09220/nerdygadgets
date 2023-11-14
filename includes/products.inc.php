<?php
    $productheader = "PRODUCTS";
 ?>
<!-- PHP QUERY PRODUCTS (SEARCH, SORT, CATEGORIES) ========================================================================================= -->
 <?php
     //-- GET SORT VALUE
     if(isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    } else {
        $sort = 'NONE'; // DEFAULT VALUE UPON LOADING PAGE AND UPON SELECTING A NEW CATEGORY
    }

    //-- GET SEARCH VALUE
    if(isset($_GET['search_query'])) {     
        $search_query = $_GET["search_query"];
        if($sort == 'NONE'){
            $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE name LIKE '%" . $search_query . "%' ORDER BY id ASC";
        } else {
            $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE name LIKE '%" . $search_query . "%' ORDER BY price " . $sort;
        }        
    }
    
    //-- GET CATEGORY UPON MAKING A SELECTION IN THE CATEGORY DROPDOWN
    if (isset($_GET['category'])) {     
        if(isset($_GET['category'])) {
            $category = $_GET['category'];
            if($sort == 'NONE'){
                $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE category = '" . $category . "' ORDER BY id ASC";
            } else {
                $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE category = '" . $category . "' ORDER BY price " . $sort ;
            }    
        } else {
            $category = 'phones'; // DEFAULT VALUE UPON LOADING PAGE
            $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE category = '" . $category . "' ORDER BY id ASC";
        }
    }
?>

<!-- PHP DB CONNECTION ========================================================================================= -->
<?php
    //-- CONNECT TO DB AND RETRIEVE DATA 
    require_once 'dbh.inc.php';
    $products = "";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products = $products . "
                <div class='col'>
                    <div class='card h-100'>
                        <div class='card-header text-capitalize text-center'>" . $row["category"] . "</div>                        
                        <img src='product_images/" . $row["image"] . ".jpg' class='card-img-top mt-3 p-3' alt='...'>                        
                        <div class='card-body'>
                            <h5 class='card-title mk-truncate-2'>" . $row["name"] . "</h5> 
                            <div class=''><p class='mk-truncate-2'>" . $row["description"] . "</p></div>               
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
            $productheader = "Nothing found :(";
        }
    $conn->close();
?>