<?php
include("createFDF.php");
$data = createFDF("fillsheet.pdf",$_POST);
$myFile = "hello.fdf";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $data."\n";
fwrite($fh, $stringData);
fclose($fh);


?>