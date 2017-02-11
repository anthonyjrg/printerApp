<div class="row">
    <section class="column small-centered text-center">
        <h2>Add New Printer</h2>
        <div class="row form">
            <form name="add" action="logic/crud.php" method="post">
                <div class="column small-6 text-left">
                    <label>Make
                        <?php
                        $url="localhost/printers/testing/query.xml";
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $url);    // get the url contents

                        $data = curl_exec($ch); // execute curl request
                        curl_close($ch);

                        $xml = simplexml_load_string($data);

                        echo "<select name=\"make\">";
                        foreach($xml as $manf){
                            echo "<option value='$manf'>".$manf."</option>";
                        }
                        echo "</select>"
                        ?>
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>Model
                        <select name="model" id="model">
                            <option></option>
                        </select>
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>Ink (<a id="addInk">ink not listed? add it +</a>)
                        <select multiple name="ink" id="ink">
                            <option value="" disabled selected></option>
                            <?php echo Display::inksOptList() ?>
                        </select>
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>Dept
                      <select name="dept" id="dept">
                            <?php echo Display::deptOptList() ?>
                       </select>
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>Sub-Dept
                        <select id="sub" name="subDept">
                        </select>
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>Driver
                    <input type="text" name="driver" placeholder="'ex. www.sharp.com'" class="column small-6">
                    </label>
                </div>
                <div class="column small-6 text-left">
                    <label>
                        <input id="network" type="checkbox" value="1" name="ntrkAble" />Network Capable
                    </label>
                    <div id="ntwBox" class="extra">
                    <div class="column small-12 text-left">
                        <label>IP Address
                            <input type="text" value="" name="ipAddr"/>
                        </label>
                    </div>
                    </div>
                </div>

<!--Extra Div Starts-->
                <div id="inkBox" class="extra">
                    <div class="small-12 column text-left">
                        <h4>Ink Type</h4>
                    </div>
                    <div class="column small-6 text-left">
                        <label>Model
                            <input type="text" name="ink" placeholder="'ex. 12A'" class="column small-6">
                        </label>
                    </div>
                    <div class="column small-6 text-left">
                        <label>Quantity In Stock
                            <input type="text" name="inkInStk" placeholder="'ex. 1..2..'" >
                    </div>
                    <div class="column small-6 text-left">
                        <label>Quantity On Order
                            <input type="text" name="inkOnOrdr" placeholder="'ex. 1..2..'" class="column small-6">
                        </label>
                    </div>
                </div>


                <div class="column small-12 text-left">
                    <input type="submit" name="submit" class="button" value="Add Printer">
                </div>

                <input type="hidden" name="type" value="addPrntr"> 
            </form>
        </div>
</div>

<script src="assets/js/xhr.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", updateSelected);
</script>