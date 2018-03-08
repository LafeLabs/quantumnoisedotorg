<?php
$svgdata = file_get_contents("http://www.quantumnoise.org/diagrammers/cryobuild/svg/svg1519877038.svg");
$foo = explode("<json>",$svgdata)[1];
$glyph = explode("</json>",$foo)[0];
echo $glyph;

?>