<!DOCTYPE html>
<html>
<head>
<!--
    http://www.quantumnoise.org/randomcurve/index.php
-->
<title>Random Noise Curve</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script>
MathJax.Hub.Config({
tex2jax: {
inlineMath: [['$','$'], ['\\(','\\)']],
processEscapes: true
}
});//			MathJax.Hub.Typeset();//tell Mathjax to update the math
</script>
<script>
    function xcothx(xin){
    if(xin!=0){
        return (xin/Math.tanh(xin));	
    }
    else{
        return 1;		
    }
}
</script>
</head>
<body>

<div id = "feedData" style = "display:none">
<?php
    $data = file_get_contents("http://www.quantumnoise.org/randomcurve/feed.txt");
    echo $data;
?>
</div>
<table id = "navbar">
<tr>
    <td id = "aboutlink">About</td>
    <td id = "feedlink">Graph Feed</td>
    <td id = "actionlink">Action</td>
</tr>
</table>
<div id = "loreScroll" class = "scroll">
<img src = "qrcode.png" style = "width:100px;">
<h4>http://www.quantumnoise.org/randomcurve/</h4>
<h4>Free open web constructor of vector graphics for of random Gaussian noise plot.</h4>
<p>
Never draw a "random" curve in an art program again!  This web document creates whatever random Gaussian curve you want.
Just specify the parameters of the plot, save, and grab your SVG.  Think of this as a factory for SVG's for use in 
any project that requires random numbers to be plotted.  
</p>
<p>
Change values as desired and hit "enter" to plot. As you change values, the text in the text boxes updates live with the full code of the SVG(scalable vector graphics) file which you are making, and 
JSON data to reconstruct your plot on this page as well as the text for the SVG file you are creating.  
JSON is "JavaScript Object Notaion", a lightweight data format which 
is very widely used(e.g. Facebook) for things like this on the Web.  To share a plot you can copy the JSON data from 
the JSON data text box, send it to a colleague, who can then paste the data into that window on their browser 
and hit the "JSON IMPORT" button.  To save a current figure to the server, hit the "SAVE SVG" button.  To see your 
new image in the feed refresh the page in your browser with "control R" or "command R". 
</p><p>
        Everything here is public domain with no restrictions 
        whatsoever including on commercial use, no attribution required, and you can copy the code if you want.  If 
        you want to copy this file and use it locally, change the php file to html and comment out all the php and it will 
        work without a network connection on any machine with a web browser.
</p>
</div>
<div id = "action">
<table id = "mainControl">
<tr class = "buttonrow"><td>JSON</td><td>IMPORT</td></tr>
<tr class = "buttonrow"><td>SAVE</td><td>SVG</td></tr>
</table>
<canvas id = "plotCanvas"></canvas>
<table id = "textTable">
    <tr>
        <td>JSON</td><td>SVG</td>
    </tr>
    <tr>
        <td><textarea id = "JSONtext"></textarea></td>
        <td><textarea id = "SVGtext"></textarea></td>
    </tr>
</table>
</div>
<div id = "svgfeed"  class = "scroll">
    <h4>Feed of SVG Format Graphs</h4>
<?php
    $dir = 'svg';
    $files1 = scandir($dir);
    for ($index = 2; $index < count($files1); $index++) {
        echo "<p><a href = \"http://www.quantumnoise.org/randomcurve/svg/";
        echo $files1[$index];
        echo "\"><img class = \"feedimg\" src = \"svg/";
        echo $files1[$index];
        echo "\"/></a>\n</p>";
    } 
?>
</div>
<script>
    document.getElementById("svgfeed").style.display = "none";
    document.getElementById("action").style.display = "block";
    document.getElementById("loreScroll").style.display = "none";

document.getElementById("aboutlink").onclick = function(){
    document.getElementById("svgfeed").style.display = "none";
    document.getElementById("action").style.display = "none";
    document.getElementById("loreScroll").style.display = "block";
}
document.getElementById("feedlink").onclick = function(){
    document.getElementById("svgfeed").style.display = "block";
    document.getElementById("action").style.display = "none";
    document.getElementById("loreScroll").style.display = "none";
}
document.getElementById("actionlink").onclick = function(){
    document.getElementById("svgfeed").style.display = "none";
    document.getElementById("action").style.display = "block";
    document.getElementById("loreScroll").style.display = "none";
}


feedData = JSON.parse("[" + document.getElementById("feedData").innerHTML + "]");
feedIndex = 0;
currentStroke = "black";


for(label in feedData[feedIndex]){
    var newtr = document.createElement("TR");
    var newtd = document.createElement("TD");
    newtd.innerHTML = label;
    newtr.appendChild(newtd);
    var newtd = document.createElement("TD");
    var newinput = document.createElement("INPUT");
    newtd.appendChild(newinput);
    newinput.value = feedData[feedIndex][label];
    newtr.appendChild(newtd);
    document.getElementById("mainControl").appendChild(newtr);
}

redraw();

inputs = document.getElementById("mainControl").getElementsByTagName("INPUT");
buttons = document.getElementsByClassName("buttonrow");

buttons[0].onclick = function(){
    feedData[feedIndex]= JSON.parse(document.getElementById("JSONtext").value);
    redraw();
}


buttons[1].onclick = function(){//save SVG
    var httpc = new XMLHttpRequest();
    var url = "svgsaver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data=" + document.getElementById("SVGtext").value);//send text to svgsaver.php
}


inputs[0].onchange = function(){
    feedData[feedIndex].sigma = parseFloat(this.value);
    redraw();
}
inputs[1].onchange = function(){
    feedData[feedIndex].height = parseFloat(this.value);
    redraw();
}
inputs[2].onchange = function(){
    feedData[feedIndex].width = parseFloat(this.value);
    redraw();
}
inputs[3].onchange = function(){
    feedData[feedIndex].N = parseFloat(this.value);
    redraw();
}
inputs[4].onchange = function(){
    feedData[feedIndex].lineWidth = this.value;
    redraw();
}
inputs[5].onchange = function(){
    feedData[feedIndex].color = this.value;
    redraw();
}



function redraw(){
    currentStroke =feedData[feedIndex].color;

    document.getElementById("JSONtext").value = JSON.stringify(feedData[feedIndex],null,"    ");
    currentSVG = "<svg width=\"" + feedData[feedIndex].width.toString() + "\" height=\"" + feedData[feedIndex].height.toString() + "\" viewbox = \"0 0 " + feedData[feedIndex].width.toString() + " " + feedData[feedIndex].height.toString() + "\"  xmlns=\"http://www.w3.org/2000/svg\">\n";
    currentSVG += "\n<!--\n<json>\n" + JSON.stringify(feedData[feedIndex],null,"    ") + "\n</json>\n-->\n";

    document.getElementById("plotCanvas").width = feedData[feedIndex].width;
    document.getElementById("plotCanvas").height = feedData[feedIndex].height;
    ctx = document.getElementById("plotCanvas").getContext("2d");
    ctx.clearRect(0, 0, feedData[feedIndex].width, feedData[feedIndex].width);
    ctx.lineWidth = feedData[feedIndex].lineWidth;
    ctx.strokeStyle=feedData[feedIndex].color;
    ctx.beginPath();	
    deltax = feedData[feedIndex].width/(feedData[feedIndex].N - 1);
    x0 = feedData[feedIndex].width/2;

    x = 0;
    randomcurve();
    currentSVG += "	<path d = \"M";
    currentSVG += Math.round(x).toString() + " ";
    currentSVG += Math.round(y).toString() + " ";

    for(x = 0;x <= feedData[feedIndex].width;x += deltax){
        if(x>0){
            currentSVG += "L" + x + " " + y + " ";
        }
        ctx.moveTo(x,y);
        xup = x + deltax;		
        randomcurve();
        ctx.lineTo(xup,y);
    }
    currentSVG += "\""+ " stroke = \"" + currentStroke + "\" stroke-width = \""+feedData[feedIndex].lineWidth+"\" fill = \"" + "none" + "\" "+"/>";

    ctx.stroke();


    currentSVG += "</svg>"; 
    document.getElementById("SVGtext").value = currentSVG;
}

function randomcurve(){
    y = 0.5*feedData[feedIndex].height - feedData[feedIndex].sigma*gauss();  
}

function gauss(){
	var u1 = Math.random();
	var u2 = Math.random();
	var z1 = Math.sqrt(-2*Math.log(u1))*Math.cos(2*Math.PI*u2);
	var z2 = Math.sqrt(-2*Math.log(u1))*Math.sin(2*Math.PI*u2);
	return z1;
}


</script>
<style>
body{
    font-family:Century;
}

#svgfeed p{
    text-align:center;
}
#svgfeed img{
    border:solid;
}

h4{
    width:100%;
    text-align:center;
}
.scroll p{
    margin:auto;
}
.scroll{
    position:absolute;
    display:none;
    top:15%;
    width:80%;
    left:10%;
    right:10%;
    overflow:scroll;
    bottom:50px;
    padding: 2em 2em 2em 2em;
    font-family:Century;
    font-size:22px;
    text-align:justify;
}
#action{
    position:absolute;
    left:0px;
    top:12%;
    right:0px;
    bottom:0px;
    overflow:hidden;
}
#plotCanvas{
    position:absolute;
    right:50px;
    top:50px;
    border:solid;
}
#mainControl{
    font-family:courier;
    font-size:24px;
    border:solid;    
    position:absolute;
    left:50px;
    top:50px;
}
#mainControl input{
    font-family:courier;
    font-size:24px;
    width:3em;
}
td{
    font-family:courier;
    font-size:24px;
}
td textarea{
    width:16em;
    height:8em;
}
.buttonrow{
    cursor:pointer;
}
.buttonrow:hover{
    background-color:green;
}
.buttonrow:active{
    background-color:yellow;
}
#navbar{
    position:absolute;
    top:0px;
    left:0px;
    width:100%;
    height:10%;
}
#navbar td{
    cursor:pointer;
    font-family:courier;
    font-size:36px;
    text-align:center;
}
#navbar td:hover{
    background-color:green;
}
#navbar td:active{
    background-color:yellow;
}

#textTable{
    position:absolute;
    left:50px;
    bottom:50px;
}
</style>
</body>
</html>
