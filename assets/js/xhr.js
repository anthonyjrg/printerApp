/**
 * Created by tony on 1/20/17.
 */

var make;

var updateSelected = function () {
    console.log("update running");
    select = document.querySelector('select');
    make = select.options[select.selectedIndex].innerHTML;
    if(make){

        xhr =  new XMLHttpRequest();
        xhr.open('GET', "assets/js/printers.xml", true);
        xhr.send();
        xhr.onreadystatechange = processRequest;
        function processRequest(e) {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                parser = new DOMParser();
                xmlDoc = parser.parseFromString(response, "text/xml");
                    var allPrints = xmlDoc.firstChild;
                    var printers = allPrints.getElementsByTagName('printer');
                    var secSel = document.getElementById('model');
                    secSel.innerHTML = "";
                    for(var i=0;i<printers.length;i++){
                        var print = printers[i].getElementsByTagName('make')[0].firstChild;
                        print = print.nodeValue;

                        if( print.toString(print) == make) {


                            var option = new Option();

                            var newTxt = printers[i].getElementsByTagName('model')[0].firstChild;

                            option.appendChild(newTxt);

                            secSel.appendChild(option);
                        }
                    }
            }
        }

    }
};

var select =  document.querySelector('select');
select.addEventListener("change",updateSelected);


