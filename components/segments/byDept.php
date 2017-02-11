<div class="row allTop">
    <section class="column small-centered text-center">
        <h2>Listing Of <?php echo ucwords(SubDepts::subDeptName($_GET['deptId'])) ?> Printers</h2>
        <div class="">
            <?php echo Display::dsplyDeptTable($_GET['deptId'])  ?>
        </div>
    </section>
</div>