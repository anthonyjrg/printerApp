<div class="row" xmlns="http://www.w3.org/1999/html">
    <section class="column small-centered text-center">
        <h2>Record Ink Change</h2>

        <div class="row form">

            <form name="add" action="" method="post">

                <div class="column small-6 text-left">
                    <label>Dept
                        <select name="dept" id="dept">
                            <?php echo Display::deptOptList() ?>
                        </select>
                    </label>
                </div>

                <div class="column small-6 text-left">
                    <label>Sub-Dept
                        <select type="" id="sub" name="subDept" >
                        </select>
                    </label>
                </div>

                <div class="column small-6 text-left">
                    <label>Printer
                        <select type="" id="prtr" name="prtr" >
                        </select>
                    </label>
                </div>

                <div class="column small-12 text-left">
                    <input type="submit" name="submit" class="button" value="Change">
                </div>
            </form>
        </div>
</div>

<script src="assets/js/main.js"></script>
