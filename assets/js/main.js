/**
 * Created by tony on 1/19/17.
 */

var inkBoxTrg = document.getElementById('addInk');
inkbox = document.getElementById('inkBox');
oldSelect = document.getElementById('ink');
var ipAddrSelect = document.getElementById('network');
var ipAddrBox = document.getElementById("ntwBox");

//Show ink box
var showBox = function () {
    inkbox.className += " showing";
    oldSelect.value = "";
    oldSelect.className = " extra";
    if(inkBoxTrg.textContent == "Close add ink box"){
        inkbox.className = "extra";
        oldSelect.className = " showing";
        inkBoxTrg.textContent = "Show add ink box again";
        return;
    }
    inkBoxTrg.textContent = "Close add ink box";
};
if(inkBoxTrg)
inkBoxTrg.onclick = showBox;

//Update SubDepts
var dept = document.getElementById("dept");
var q;
dept.addEventListener("change",function () {
    q = dept.value;
    var prtr = document.getElementById('prtr');
    if (prtr){
    prtr.innerHTML = "";
    }
    var xhr =  new XMLHttpRequest();
    xhr.open('GET', "logic/showSubDept.php?id="+q, true);
    xhr.send();
    xhr.onreadystatechange = processRequest;
    function processRequest(e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            var subDept = document.getElementById('sub');
            subDept.innerHTML = response;
        }
    }
});

//update printers
//var subDept = document.getElementById("dept");
var subDept = document.getElementById("sub");

subDept.addEventListener("change",function () {
   console.log("change")
});

subDept.addEventListener("change",function () {
    var prtr = document.getElementById('prtr');
    var id = subDept.value;
    var xhr =  new XMLHttpRequest();
    xhr.open('GET', "logic/showPrtsBySubDept.php?id="+id, true);
    xhr.send();
    xhr.onreadystatechange = processRequest;
    function processRequest(e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            prtr.innerHTML = response;
        }
    }
});


//Show ipAddrBox
if(ipAddrSelect) {
    ipAddrSelect.addEventListener("change", function () {
        if (ipAddrSelect.checked == true) {
            ipAddrBox.className += " showing"
        } else {
            ipAddrBox.className = "extra"
        }
    })
};
