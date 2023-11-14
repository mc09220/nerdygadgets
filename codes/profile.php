<?php 
    // --------------------------------------------------------------
    // IMPORT FILES FOR FURTHER PROCESSING
    require_once 'includes/dbh.inc.php';
    include_once 'header.php'; 
?>

    <div class="row bg-white mt-3 justify-content-center">
        <div class="col-sm-8 p-3">
            <form action="includes/signout.inc.php" method="post">

                <?php
                    $uid = $_SESSION["uid"];
                    $sql = "SELECT * FROM user WHERE email = '" . $uid . "';";
                    $results = mysqli_query($conn,$sql);
                    if ($results) {
                        if (mysqli_num_rows($results) > 0) {
                            while($row = mysqli_fetch_array($results)){
                                $fn = $row['first_name'];
                                $ln = $row['surname'];
                                $sn = $row['street_name'];
                                $hn = $row['apartment_nr'];
                                $pc = $row['postal_code'];
                                $ct = $row['city'];
                                $em = $row['email'];
                            }
                        }
                    }
                    //print_r($results);
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3 h1 bold text-start">PROFILE</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"><input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo $fn;?>"></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo $ln;?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-9"><input type="text" class="form-control" name="sname" placeholder="Street name" value="<?php echo $sn;?>"></div>
                        <div class="col-md-3"><input type="text" class="form-control" name="hnmbr" placeholder="number" value="<?php echo $hn;?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3"><input type="text" class="form-control" name="pcode" placeholder="P-code" value="<?php echo $pc;?>"></div>
                        <div class="col-md-9"><input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $ct;?>"></div>
                    </div>
                    <hr class="hr mt-4 mb-4" />
                    <div class="row mt-3">
                        <div class="col-md-12"><input type="email" class="form-control" name="email" placeholder="Email" disabled value="<?php echo $em;?>"></div>
                    </div>
                    <hr class="hr mt-4 mb-4" />
                </div>
                <button type="submit" name="submit" class="btn btn-secondary float-end me-3">Sign out</button>
            </form>
        </div>
    </div>

<?php include_once 'footer.php';?>