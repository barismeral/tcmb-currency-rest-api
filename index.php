<?php

require('./xmlparser.php');

$parser = new XmlParser;

$json = null;

$id =null;

if($_GET){

    $id = $_GET['id'];

    if($id>18){
        echo 'null';
        die;
    }

     $json = $parser->getCurrency((int)$id);
    
    header('Content-Type: application/json');

    echo $json;
    
}
else
  echo $parser->getCurrencys();


?>