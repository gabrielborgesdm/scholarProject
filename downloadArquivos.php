<?php
if (isset($_GET['linkAtividade'])){
    $path = $_GET["linkAtividade"];
    $file = basename($path);
}
else{
    header("location: listarAtividades.php");
    die();
}


if (file_exists($path) && is_readable($path))
{
    //get the file size and send the http headers
    $size = filesize($path);


    header('Content-Type: application/x-rar-compressed, application/octet-stream');
    header('Content-Length: '.$size);
    header('Content-Disposition: attachment; filename='.$file);
    header('Content-Transfer-Encoding: binary');

    readfile($filename);
}
else{
    header("location: listarAtividades.php");
    die();
}

?>