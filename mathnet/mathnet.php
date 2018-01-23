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
<div id = "importData" style = "display:none;">
<?php
	// The value of the variable name is found
    $url = $_GET["url"];//get url
    $data = file_get_contents($url);
    echo $data;
?>
</div>


</body>