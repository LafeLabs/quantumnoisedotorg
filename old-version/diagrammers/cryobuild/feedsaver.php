 <?php
/* javascript this pairs with:

  document.getElementById("savesvg").onclick = function(){
        currentSVG = "<svg width=\"" + innerWidth.toString() + "\" height=\"" + innerHeight.toString() + "\" viewbox = \"0 0 " + innerWidth.toString() + " " + innerHeight.toString() + "\"  xmlns=\"http://www.w3.org/2000/svg\">\n";
        currentSVG += "\n<!--\n<glyph>\n" + currentTable[currentAddress] + "\n</glyph>\n-->\n";
        doTheThing(0300);
        drawGlyph(currentTable[currentAddress]);
        currentSVG += "</svg>";
        document.getElementById("textIO").value = currentSVG;
        var httpc = new XMLHttpRequest();
        var url = "feedsaver.php";        
        httpc.open("POST", url, true);
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpc.send("data=" + encodeURIComponent(document.getElementById("textIO").value));//send text to saver.php
 }

*/
    $data = $_POST["data"]; //get data 
    $filename = "svg".time().".svg";
    $file = fopen("svg/".$filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file
    $oldfeed = file_get_contents("svg/index.html"); 
    $file = fopen("svg/index.html","w");// create new file with this name
    fwrite($file,"<p><a href = \"".$filename."\"><img src = \"".$filename."\"></a></p>\n".$oldfeed); //write data to file
    fclose($file);  //close file
?>