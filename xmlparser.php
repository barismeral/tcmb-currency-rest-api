<?php


class XmlParser{

    private $xml;
    private $name ="";
    private $buying ="";
    private $selling = "";
    

   public function __constructor(){

        
    }


   
    public function getCurrency($id){

        $xml  = simplexml_load_file("http://www.tcmb.gov.tr/kurlar/today.xml");

            if($id>11){
                $name = $xml->Currency[$id]->CurrencyName;
                $buying = $xml->Currency[$id]->ForexBuying;
                $selling = $xml->Currency[$id]->ForexSelling;

                return '{"CurrencyName":"'.$name.'","BanknoteBuying":'.$buying.',"BanknoteSelling":'.$selling.'}';

            }


        $name = $xml->Currency[$id]->CurrencyName;
        $buying = $xml->Currency[$id]->BanknoteBuying;
        $selling = $xml->Currency[$id]->BanknoteSelling;
        return '{"CurrencyName":"'.$name.'","BanknoteBuying":'.$buying.',"BanknoteSelling":'.$selling.'}';


    }

    public function getCurrencys(){
        $xml  = simplexml_load_file("http://www.tcmb.gov.tr/kurlar/today.xml");

           $array = '[';
           
           for($i=0; $i<11; $i++){

            $name = $xml->Currency[$i]->CurrencyName;
            $buying = $xml->Currency[$i]->BanknoteBuying;
            $selling = $xml->Currency[$i]->BanknoteSelling;
           $array .= '{"CurrencyName":"'.$name.'","BanknoteBuying":'.$buying.',"BanknoteSelling":'.$selling.'},<br>';

           }
           for($i=12;$i<19;$i++){
            $name = $xml->Currency[$i]->CurrencyName;
            $buying = $xml->Currency[$i]->ForexBuying;
            $selling = $xml->Currency[$i]->ForexSelling;
            $array .= '{"CurrencyName":"'.$name.'","BanknoteBuying":'.$buying.',"BanknoteSelling":'.$selling.'},<br>';


           }

          $array = trim($array,',<br>');
           
           return $array.']';


    }



}

?>