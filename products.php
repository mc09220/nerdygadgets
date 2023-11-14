<?php include_once 'header.php'; ?>
<?php include_once 'includes/products.inc.php'; ?>


    <div class="row bg-white mt-3 p-3">
        <div class="col">
            <div class='row'>
                <div class='col-sm pt-3 text-uppercase h5'><?php echo $productheader; ?></div>
                <!-- SORT ========================================================================================= -->
                <div class='col-sm p-2'>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle float-end me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sorteren</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="products.php?<?php echo isset($category) ? 'category=' . $category : 'search_query=' . $search_query; ?>&sort=ASC">Prijs laag-hoog</a></li>
                            <li><a class="dropdown-item" href="products.php?<?php echo isset($category) ? 'category=' . $category : 'search_query=' . $search_query; ?>&sort=DESC">Prijs hoog-laag</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- SEARCH RESULTS ========================================================================================= -->
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 mt-2">
                <?php echo $products; ?>
            </div>
        </div>
    </div>

<?php include_once 'footer.php';?>