<?php

require('./api.php');

$parser = new API;

if($_GET){

    $id = $_GET['id'];

     $json = $parser->getCurrency((string)$id);
    
    header('Content-Type: application/json');

    echo $json;
    
}
else
  echo $parser->getCurrencys();

?>