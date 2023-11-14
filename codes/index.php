<?php include 'header.php'; ?>
<?php include_once 'includes/index.inc.php'; ?>

<div class="section-main">
    <div class="content">
        <div class="textBox">
            <h4>Verrijk uw Geek Lifestyle met <span>Nerdy Gadgets</span></h4>
            <p>Welkom bij NerdyGadgets, waar de toekomst tot leven komt! Onze missie is om geeks en tech-liefhebbers
                te voorzien van cutting-edge technologieën en innovatieve snufjes. Wij streven naar kwaliteit, innovatie en
                klanttevredenheid, en we willen een gemeenschap van technologie-enthousiastelingen bouwen die samen de toekomst verkennen.
                Word deel van de toekomst. Word NerdyGadgets!</p>
            <a href="shipping.html">Lees Meer</a>
        </div>
        <div class="imgBox">
            <img src="images/homepage vrouw.png" class="Gadget border-bottom border-4">
        </div>

    </div>
</div>
</section>

<div class="row bg-white mt-3 p-3 border rounded-2">
        <div class="col">
            <div class='row'>
                <div class='col-sm pt-3 text-uppercase h5 text-center'><?php echo $productheader; ?></div>
            </div>
            <!-- FEATURED PRODUCTS -->
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 mt-2">
                <?php echo $products; ?>
            </div>
        </div>
    </div>


<?php include 'footer.php'; ?>
