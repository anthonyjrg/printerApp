<!--top row in body-->
<div class="row">
    <section class="column small-centered text-center">
        <h2>Try Choosing a Department To See Its Printers</h2>
        <div class="dept">
            <ul>
                <?php echo Display::liOfDept(); ?>
            </ul>
        </div>
    </section>
</div>
<!--endof top row in body-->

<!--mini status row-->
<div class="row btmBox">
    <div class="column small-4 text-center">
        <p class="bigFont">
            <?php echo Display::total(Printers::showAllPrinters()); ?>
        </p>
        <h5>Total Printers</h5>
    </div>

    <div class="column small-4 text-center">
        <p class="bigFont">
            <?php echo Display::total(Inks::inkSum())?>
        </p>
        <h5>Inks In Stock</h5>
    </div>

    <div class="column small-4 text-center">
        <p class="bigFont">
<!--            @todo implement a total count of printer status 'out of ink'-->
            <?php echo Display::total(); ?>
        </p>
        <h5>Printers Without Ink</h5>
    </div>
</div>
<!--endof mini status row-->