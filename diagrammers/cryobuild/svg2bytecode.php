<?php
$svgdata = file_get_contents("http://www.quantumnoise.org/diagrammers/cryobuild/svg/svg1519790612.svg");
$foo = explode("<glyph>",$svgdata)[1];
$glyph = explode("</glyph>",$foo)[0];
echo $glyph;

?>