<!DOCTYPE HTML>
<html>
<head>
<!--     
	PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

LAWS OF GEOMETRON:
	NO PROPERTY 
	NO MONEY
	NO MINING
	EVERYTHING IS RECURSIVE
	EVERYTHING IS FRACTAL
	EVERYTHING IS PHYSICAL
[EGO DEATH]:
	LOOK TO THE FUNGI
	LOOK TO THE INSECTS
	LANGUAGE IS THE TOOL THE MIND USES TO PARSE REALITY-->    
	<title>/www.quantumnoise.org/</title>
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
<?php
    $data = file_get_contents("http://www.quantumnoise.org/html/page.txt");
    echo $data;
?>

<?php
    echo "<style>\n";
    $data = file_get_contents("http://www.quantumnoise.org/css/style.txt");
    echo $data;
    echo "</style>\n";
?>
	
</body>
</html>

	