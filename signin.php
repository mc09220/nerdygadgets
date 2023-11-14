<?php include_once 'header.php'; ?>

    <div class="row bg-white mt-3 justify-content-center">
        <div class="col-sm-8 p-3">
            <form action="includes/signin.inc.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3 h1 bold text-start">LOG IN</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><input type="password" class="form-control" name="pwd" placeholder="Wachtwoord"></div>
                    </div>
                    <hr class="hr mt-4 mb-4" />
                </div>                
                <button type="submit" name="submit" class="btn btn-secondary float-end me-3">Log in</button>
                <a class="btn btn-secondary float-end me-3" href="signup.php">Registreer</a>
            </form>            
        </div>
    </div>

    <!-- SHOW PROCESS MESSAGE -->
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {echo "<div class='alert alert-warning mt-3  text-center'><strong>Waarschuwing! </strong>Vul alle velden in!</div>";}
            else if ($_GET["error"] == "wrongsignin") {echo "<div class='alert alert-warning mt-3 text-center'><strong>Waarschuwing! </strong>Incorrecte login informatie!</div>";}
        }
    ?>

<?php include_once 'footer.php';?>