<?php
/* javascript this pairs with:

    buttons0630[11].onclick = function(){//SAVE JSON 
        currentData = JSON.parse(getJSON());       
        currentDataArray[currentDataIndex] = currentData;
        document.getElementById("textIO0630").value = JSON.stringify(currentDataArray,null,"    ");
        var httpc = new XMLHttpRequest();
        var url = "saver.php";        
        httpc.open("POST", url, true);
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpc.send("data=" + document.getElementById("textIO0630").value + "&" + "currentDeck=" + currentDeck.toString(8));//send text to saver.php
    }
*/
    $data = $_POST["data"]; //get data 
    $filename = "outfeed.txt";  //put it data file
    $file = fopen($filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file
?>