<?php include_once 'header.php'; ?>

    <div class="row bg-white mt-3 justify-content-center">
        <div class="col-sm-8 p-3">
            <form action="includes/signup.inc.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3 h1 bold text-start">REGISTREREN</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5"><input type="text" class="form-control" name="fname" placeholder="Voornaam"></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="lname" placeholder="Achternaam"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-9"><input type="text" class="form-control" name="sname" placeholder="Straatnaam"></div>
                        <div class="col-md-3"><input type="text" class="form-control" name="hnmbr" placeholder="Huisnummer"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3"><input type="text" class="form-control" name="pcode" placeholder="Postcode"></div>
                        <div class="col-md-9"><input type="text" class="form-control" name="city" placeholder="Stad"></div>
                    </div>
                    <hr class="hr mt-4 mb-4" />
                    <div class="row mt-3">
                        <div class="col-md-12"><input type="email" class="form-control" name="email" placeholder="Email"></div>
                    </div>

                    <div class="input-group d-flex mt-3">
                        <input type="password" class="form-control rounded mt-1" name="pwd" placeholder="Wachtwoord" aria-label="password" aria-describedby="password" id="password-input"/>
                    </div>
                    <div class="col-6 mt-4 mt-xxl-0 w-auto h-auto">
                        <div class="alert px-4 py-3 mb-0 d-none" role="alert" data-mdb-color="warning" id="password-alert">
                            <ul class="list-unstyled mb-0" style="list-style-type: none;">
                                <li class="requirements leng" style="text-align: left"><i class="bi bi-check-circle text-success" style="margin-right:5px"></i><i class="bi-x-circle text-danger" style="margin-right:5px"></i>Your password must have at least 8 chars</li>
                                <li class="requirements big-letter" style="text-align: left"><i class="bi bi-check-circle text-success" style="margin-right:5px"></i><i class="bi-x-circle text-danger" style="margin-right:5px"></i>Your password must have at least 1 big letter.</li>
                                <li class="requirements num" style="text-align: left"><i class="bi bi-check-circle text-success" style="margin-right:5px"></i><i class="bi-x-circle text-danger" style="margin-right:5px"></i>Your password must have at least 1 number.</li>
                                <li class="requirements special-char" style="text-align: left"><i class="bi bi-check-circle text-success" style="margin-right:5px"></i><i class="bi-x-circle text-danger" style="margin-right:5px"></i>Your password must have at least 1 special char.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="row mt-3">
                        <div class="col-md-12"><input type="password" class="form-control" name="pwd" placeholder="Password"></div>
                    </div> -->
                    <div class="row mt-3">
                        <div class="col-md-12"><input type="password" class="form-control" name="pwdr" placeholder="Herhaal wachtwoord"></div>
                    </div>
                    <hr class="hr mt-4 mb-4" />
                </div>
                <button type="submit" name="submit" class="btn btn-secondary float-end me-3">Registreer</button>
            </form>
        </div>
    </div>

    
    <!-- SHOW PROCESS MESSAGE -->
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {echo "<div class='alert alert-warning mt-3 text-center'><strong>Waarschuwing! </strong>Vul alle velden in!</div>";}
            else if ($_GET["error"] == "invalidemail") {echo "<div class='alert alert-warning mt-3 text-center'><strong>Waarschuwing! </strong>Je hebt een niet-valide email opgegeven!</div>";}
            else if ($_GET["error"] == "passwordsdontmatch") {echo "<div class='alert alert-warning mt-3 text-center'><strong>Waarschuwing! </strong>De wachtwoorden komen niet overeen!</div>";}
            else if ($_GET["error"] == "emailtaken") {echo "<div class='alert alert-warning mt-3 text-center'><strong>Waarschuwing! </strong>Dit email adres is al geregistreerd!</div>";}
            else if ($_GET["error"] == "stmtfailed") {echo "<div class='alert alert-warning mt-3 text-center'><strong>Waarschuwing! </strong>Iets gaat fout, probeer opnieuw!</div>";}
            else if ($_GET["error"] == "none") {echo "<div class='alert alert-success mt-3 text-center'><strong>Success! </strong>Je bent geregistreerd!</div>";}
        }
    ?>

<?php include_once 'footer.php';?>