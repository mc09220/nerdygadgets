  <?php
    //-- GET ID OF SELECTED PRODUCT
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM nerdy_gadgets_start.product WHERE id = '" . $id . "'";  

        //-- CONNECT TO DB AND RETRIEVE DATA 
        require_once 'dbh.inc.php';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name']; 
                $description = $row['description'];
                $price = $row['price'];
                $category = $row['category'];
                $image = $row['image']; 
            }
        }
        //echo $name;
    } else {
        echo "is nie goe!";
    }
?>