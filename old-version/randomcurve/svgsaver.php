<?php
/* javascript this pairs with:

buttons[4].onclick = function(){//save SVG
    var httpc = new XMLHttpRequest();
    var url = "svgsaver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data=" + document.getElementById("SVGtext").value);//send text to svgsaver.php
}
*/

    $str = $_POST["data"]; //get data
    $nowdatecode = time(); 
    $filename = "svg/svgfile".$nowdatecode.".svg";  //filename
    $file = fopen($filename,"w");// create new file with this name
    fwrite($file,$str); //write data to file
    fclose($file);  //close file
    
?>