<?php
/* javascript this pairs with:

buttons[4].onclick  = function(){
    datastring = JSON.stringify(data,null,"    ");
    var httpc = new XMLHttpRequest();
    var url = "feed/saver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data=" + datastring);//send text to saver.php
}

*/
    $data = $_POST["data"]; //get data 
    $decoded = urldecode($data);
    $olddata = file_get_contents("data.txt");
    $newdata = $decoded.",\n".$olddata;
    $file = fopen("data.txt","w");// create new file with this name
    fwrite($file,$newdata); //write data to file
    fclose($file);  //close file
?>