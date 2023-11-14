<?php include_once 'header.php'; ?>
<?php include_once 'includes/checkout.inc.php'; ?>

<div class="row bg-white mt-3 p-3">
        <div class="col">
            <div class='row'>
                <div class='col-sm pt-3 text-uppercase h5 text-start mb-4'>INHOUD WINKELWAGEN</div>
            </div>

             
         <div class="row">
            <!-- PRODUCTS -->
            <div class="col-lg-7">
               <?php echo $CheckoutItems; ?>
            </div>
            <!-- CARD DETAILS -->
            <div class="col-lg-5">
               <div class="card hkcolor text-white rounded-3">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Kaart details</h5>
                        <i class="h1 bi bi-credit-card"></i>
                     </div>
                     <p class="small mb-2">Kaart Type</p>
                     <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                     <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                     <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                     <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>
                     <form class="mt-4">
                        <div class="form-outline form-white mb-4">
                           <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                              placeholder="Kaarthouder" />
                           <label class="form-label" for="typeName">Kaarthouder</label>
                        </div>
                        <div class="form-outline form-white mb-4">
                           <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                              placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                           <label class="form-label" for="typeText">Kaart Nummer</label>
                        </div>
                        <div class="row mb-4">
                           <div class="col-md-6">
                              <div class="form-outline form-white">
                                 <input type="text" id="typeExp" class="form-control form-control-lg"
                                    placeholder="MM/JJJJ" size="7" id="exp" minlength="7" maxlength="7" />
                                 <label class="form-label" for="typeExp">Vervaldatum</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-outline form-white">
                                 <input type="password" id="typeText" class="form-control form-control-lg"
                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                 <label class="form-label" for="typeText">Cvv</label>
                              </div>
                           </div>
                        </div>
                     </form>
                     <hr class="my-4">
                     <div class="d-flex justify-content-between">
                        <p class="mb-2">Subtotaal</p>
                        <p class="mb-2">€ <?php echo $totalPrice ?></p>
                     </div>
                     <div class="d-flex justify-content-between">
                        <p class="mb-2">Verzendkosten</p>
                        <p class="mb-2">€ <?php echo $shippingCosts ?></p>
                     </div>
                     <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Totaal(Incl. BTW)</p>
                        <p class="mb-2">€ <?php echo $totalPrice + $shippingCosts ?></p>
                     </div>
                     <button type="button" class="btn btn-secondary btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                           <span>Betalen <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                     </button>
                  </div>
               </div>
            </div>
         </div>




        </div>
    </div>

<?php include_once 'footer.php';?>