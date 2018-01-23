<!DOCTYPE HTML>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script>
MathJax.Hub.Config({
    tex2jax: {
    inlineMath: [['$','$'], ['\\(','\\)']],
    processEscapes: true
    }
});//			MathJax.Hub.Typeset();//tell Mathjax to update the math
</script>
</head>
<body>
<ul style = "display:none" id = "outfeeddata">
<?php
	// The value of the variable name is found
    $url = $_GET["url"];//get url
    $data = file_get_contents($url);
    echo $data;
?>
</ul>            
<h2>Moe's Math Feed</h2>
<div id = "centerdiv">
    <div id = "mathdisplay"></div>
    <textarea id = "matheditor"></textarea>        
    <div class = "butt"  id = "savebutton">SAVE</div>
    <div class = "butt" id = "loadbutton">LOAD</div>
    <div class = "butt" id = "prevbutton">PREV</div>
    <div class = "butt" id = "nextbutton">NEXT</div>
    <div class = "butt" id = "pushbutton">PUSH</div>
</div>
<ul id = "infeed"></ul>
<ul id = "outfeed"></ul>


<script>

eqindex = 0;
outfeeddata = document.getElementById("outfeeddata").getElementsByTagName("LI");
document.getElementById("matheditor").value = outfeeddata[eqindex].innerHTML;
document.getElementById("mathdisplay").innerHTML = "$" + document.getElementById("matheditor").value + "$";

for(var index = 0;index < outfeeddata.length;index++){
    var newli = document.createElement("LI");
    newli.innerHTML = "$" + outfeeddata[index].innerHTML + "$";
    document.getElementById("outfeed").appendChild(newli);
}

outfeed = document.getElementById("outfeed").getElementsByTagName("li");
outfeed[eqindex].style.backgroundColor = "#c0c0c0";

document.getElementById("matheditor").onkeyup = function(){
    document.getElementById("mathdisplay").innerHTML = "$" + this.value + "$";
    outfeed[eqindex].innerHTML = "$" + this.value + "$";
    outfeeddata[eqindex].innerHTML = this.value;
    MathJax.Hub.Typeset();//tell Mathjax to update the math

}

currentURL = "http://www.quantumnoise.org/mathnet/zeke/outfeed.txt";

document.getElementById("loadbutton").onclick = function(){
    var httpc = new XMLHttpRequest();
    httpc.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            var zekedata = this.responseText;
        }
    };
    httpc.open("GET", "loader.php?url=" + currentURL, true);
    httpc.send();
}


document.getElementById("savebutton").onclick = function(){
    var httpc = new XMLHttpRequest();
    var url = "saver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data=" + document.getElementById("outfeeddata").innerHTML);//send text to saver.php
}


document.getElementById("nextbutton").onclick = function(){
    outfeed[eqindex].style.backgroundColor = "white";
    eqindex++;
    if(eqindex>outfeed.length -1){
        eqindex = 0;
    }
    outfeed[eqindex].style.backgroundColor = "#c0c0c0";
    document.getElementById("matheditor").value = outfeeddata[eqindex].innerHTML;
    document.getElementById("mathdisplay").innerHTML = "$" + outfeeddata[eqindex].innerHTML + "$";
    MathJax.Hub.Typeset();//tell Mathjax to update the math
}
document.getElementById("prevbutton").onclick = function(){
    outfeed[eqindex].style.backgroundColor = "white";
    eqindex--;
    if(eqindex <0){
        eqindex = outfeed.length -1;
    }
    outfeed[eqindex].style.backgroundColor = "#c0c0c0";
    document.getElementById("matheditor").value = outfeeddata[eqindex].innerHTML;
    document.getElementById("mathdisplay").innerHTML = "$" + outfeeddata[eqindex].innerHTML + "$";
    MathJax.Hub.Typeset();//tell Mathjax to update the math
}
document.getElementById("pushbutton").onclick = function(){
    outfeed[eqindex].style.backgroundColor = "white";
    var newli = document.createElement("LI");
    newli.innerHTML = "";   
    document.getElementById("outfeeddata").appendChild(newli);
    outfeeddata = document.getElementById("outfeeddata").getElementsByTagName("LI");
    var newli = document.createElement("LI");
    newli.innerHTML = "$$";
    document.getElementById("outfeed").appendChild(newli);
    outfeed = document.getElementById("outfeed").getElementsByTagName("LI");
    eqindex = outfeed.length-1;
    outfeed[eqindex].style.backgroundColor = "#c0c0c0";
    document.getElementById("matheditor").value = outfeeddata[eqindex].innerHTML;
    document.getElementById("mathdisplay").innerHTML = "$" + outfeeddata[eqindex].innerHTML + "$";
    MathJax.Hub.Typeset();//tell Mathjax to update the math

}

</script>

<style>
html{
    font-family:courier;
}
textarea{
    font-family:courier;
    font-size:18px;
}
h2{
    width:100%;
    text-align: center;
}
#centerdiv{
    position:absolute;
    left:35%;
    width:30%;
    text-align: center;
}
#mathdisplay{
    width:90%;
    height:3em;
    margin:auto;
    font-size:26px;
    padding-top:1em;
}
#matheditor{
    margin-top:0.5em;
    width:90%;
    height:5em;
    font-size:20px;
}

#outfeed{
    position:absolute;
    overflow:scroll;
    top:15em;
    bottom:1em;
    left:1em;
    width:30%;
    border:solid;
    border-radius:1em;
    padding:1em 1em 1em 1em;
    list-style-type: none;
}
#infeed{
    border-radius:1em;
    padding:1em 1em 1em 1em;
    position:absolute;
    overflow:scroll;
    top:15em;
    bottom:1em;
    right:1em;
    width:30%;
    border:solid;
    list-style-type: none;
}
li{
    margin-top:1em;
}
.butt{
    cursor:pointer;
}
.butt:hover{
    background-color:green;
}
.butt:active{
    background-color:yellow;
}
</style>

</body>