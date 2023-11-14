<?php include_once 'header.php'; ?>
<?php include_once 'includes/product.inc.php'; ?>

    <div class="row bg-white mt-3 p-3 border rounded-2">
        <div class="col">
            <div class='row'></div>
            <div class="row row-cols-1 g-4 mt-2">
            <div class='col'>
                <div class='card h-100'>
                    <div class='card-header text-capitalize text-center'><?php echo $category; ?></div>
                    <div class='card-body  text-center'>
                        <h5 class='card-title'><?php echo $name; ?></h5>
                    <img src='product_images/<?php echo $image; ?>.jpg' class='card-img-top mt-3' style='max-width: 500px;width: 100%;height: auto;' alt='...'>
                    </div>
                    <div class='card-body  text-center'>
                        <div class=''><p class=''><?php echo $description; ?></p></div>
                    </div>
                    <div class='card-footer p-0'>
                        <div class='row'>
                            <div class='col-sm pt-3  text-center'>€ <?php echo $price; ?></div>
                            <div class='col-sm border-start p-2 text-center'>
                                <form action="includes/cart.inc.php" method="post">
                                    <input type="hidden" name="quantity" value="1"> <!-- USE TYPE HIDDEN FOR PASSINGVARIABLE WITHOUT USER INPUT -->
                                    <input type="hidden" name="product_id" value="<?php echo $id; ?>"> <!-- USE TYPE HIDDEN FOR PASSINGVARIABLE WITHOUT USER INPUT -->
                                    <button class="btn btn-secondary" name="" type="submit">In winkelwagen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

 <?php include_once 'footer.php';?>