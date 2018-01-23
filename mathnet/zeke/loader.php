<?php
$url = $_REQUEST["url"];//get url
$data = file_get_contents($url);
echo $data;
?>