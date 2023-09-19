<?php

    $baseurl = "data.txt";

    $data = file_get_contents($baseurl);
    $jsondata =json_decode($data);
    
    $pageurl = $jsondata->page;
    $pageeventsurl = $jsondata->pageevents;
    $initurl = $jsondata->init;
    $redrawurl = $jsondata->redraw;
    $styleurl = $jsondata->style;
    $junctionsurl = $jsondata->junctions;
        
?>   
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
<div style = "display:none" id = "datadiv">
<?php
    $data = file_get_contents($junctionsurl);
    echo $data;
?>   
</div>
<?php
    $data = file_get_contents($pageurl);
    echo $data;
?>   
<script>

init();
function init(){
    <?php
        $data = file_get_contents($initurl);
        echo $data;
    ?>
    redraw();    
}

function redraw(){
    <?php
        $data = file_get_contents($redrawurl);
        echo $data;
    ?>   
}
<?php
$data = file_get_contents($pageeventsurl);
    echo $data;
?>   
</script>
<?php
    echo "<style>\n";
    $data = file_get_contents($styleurl);
    echo $data;
    echo "</style>\n";
?>
</body>
</html>