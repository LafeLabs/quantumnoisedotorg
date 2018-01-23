<?php
/* javascript this pairs with:

buttons[3].onclick = function(){
    var httpc = new XMLHttpRequest();
    var url = "saver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data=" + JSON.stringify(currentJSON,null,"    "));//send text to saver.php
}

*/
    $newdata = $_POST["data"]; //get data 
    $olddata = file_get_contents("http://www.quantumnoise.org/theorycurve/feed.txt"); 
    $file = fopen("feed.txt","w");// open feed file
    fwrite($file,$newdata.",".$olddata); //write data to file
    fclose($file);  //close file
?>