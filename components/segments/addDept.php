<div class="row">
    <section class="column small-centered text-center">
        <h2>Add New Department</h2>
        <div class="row form">
            <form name="add" action="logic/crud.php" method="post">
                <div class="column small-6 text-left">
                    <label>Dept
                      <select name="dept" id="dept">
                            <?php
                                $depts = Dept::showAllDept();
                            foreach ($depts as $dept){
                                echo $id = $dept['dept'];
                                echo $id = Dept::getDeptId($id);
                                echo "<option value=".$id['id'].">".ucfirst($dept['dept'])."</option>";
                            }
                            ?>
                       </select>
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>Sub-Dept
                        <input type="text" name="subDept" />
                    </label>
                </div>
                <div class="column small-12 text-left">
                    <input type="submit" name="submit" class="button" value="Create Department">
                </div>
            </form>
        </div>
</div>

<script src="assets/js/xhr.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", updateSelected);
</script>