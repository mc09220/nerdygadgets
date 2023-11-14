<?php
    session_start(); // KEEPS TRACK OF USERS SESSIONS IN ALL PAGES BECAUSE HEADER IS IMPORTED IN ALL PHP-FILES
?>

<?php
    $totalQuantity = 0;
    if (isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $quantity) {
            $totalQuantity += $quantity;
        }
    }
?>

<!--HTML------------------------------------------------------------------------------------>      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NerdyGadgets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> <!-- ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
</head>
<body>


 <!-- HEADER ========================================================================================= -->
 <div class="row bg-white rounded-2 navbarhk">
    <div class="col">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="#" class="logo justify-content-center"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll me-2" style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorieën</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="products.php?category=laptops">laptops</a></li>
                                <li><a class="dropdown-item" href="products.php?category=phones">phones</a></li>
                                <li><a class="dropdown-item" href="products.php?category=opslag">opslag</a></li>
                                <li><a class="dropdown-item" href="products.php?category=routers">routers</a></li>
                                <li><a class="dropdown-item" href="products.php?category=componenten">componenten</a></li>
                                <li><a class="dropdown-item" href="products.php?category=desktops">desktops</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form method="get" action="products.php" class="search-bar me-auto">
                        <input type="text" placeholder="Waar ben je naar op zoek?" name="search_query">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                    <div class="col-md-2">
                        <!--menu-icons-->       
                        <div class="nav-icon justify-content-center pt-2">
                            <a href="index.php"><i class='bx bx-home-alt'></i></a>
                            <div style="position: relative;float:right">
                                <a href="checkout.php"><i class='bx bx-cart'></i></a>
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger border border-light" style="top:0px; right:-7px "><?php echo $totalQuantity ?><span class="visually-hidden">unread messages</span></span>                            
                            </div>
                             <!-- LOGIN ========================================================================================= -->
                            <?php 
                                if (isset($_SESSION["uid"])) {
                                    echo "<a href='profile.php'><i class= 'bx bx-user'></i></a>";
                                } else {
                                    echo "<a href='signin.php'><i class= 'bx bx-user'></i></a>";
                                }
                            ?>


                            <div class="bx bx-menu" id="menu-icon"></div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>