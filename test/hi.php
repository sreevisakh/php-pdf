
<?php
			/*passthru("C:\wamp\bin\php\safedir\pdftk.exe C:\wamp\www\forms\test\fillsheet.pdf fill_form C:\wamp\www\forms\test\hi123.fdf output C:\wamp\www\forms\test\flatFile.pdf flatten");
			echo"<pre>". shell_exec('pdftk.exe fillsheet.pdf fill_form hi123.fdf output flatFile.pdf flatten')."</pre>";
			*/
$path = $_SERVER['DOCUMENT_ROOT']."/path2file/"; // change the path to fit your websites document structure
$fullPath = $path.$_GET['download_file'];
 
if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf"); // add here more headers for diff. extensions
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
        break;
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;

?>
