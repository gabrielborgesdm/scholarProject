<?php
function conexaoDB(){
   $conn = new PDO("mysql:host=localhost;dbname=id5160336_sitedaescola", "id5160336_gabrielborgesdm", "Banco@7216");
   return $conn;
}

?>