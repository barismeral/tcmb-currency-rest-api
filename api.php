<?php


class API{



   public function __constructor(){}

    public function getCurrency($id){

        $id = strtoupper($id);

        $xml  = simplexml_load_file("http://www.tcmb.gov.tr/kurlar/today.xml");

        $index=0;

        switch($id){

            case 'USD':
            $index = 0;
            break;

            case 'AUD':
            $index = 1;
            break;

            case 'DKK':
            $index = 2;
            break;

            case 'EUR':
            $index = 3;
            break;

            case 'GBP':
            $index = 4;
            break;

            case 'CHF':
            $index = 5;
            break;

            case 'SEK':
            $index = 6;
            break;

            case 'CAD':
            $index = 7;
            break;

            case 'KWD':
            $index = 8;
            break;

            case 'NOK':
            $index = 9;
            break;

            case 'SAR':
            $index = 10;
            break;

            case 'JPY':
            $index = 11;
            break;

            case 'BGN':
            $index = 12;
            break;

            case 'RON':
            $index = 13;
            break;

            case 'RUB':
            $index = 14;
            break;

            case 'IRR':
            $index = 15;
            break;

            case 'CNY':
            $index = 16;
            break;

            case 'PKR':
            $index = 17;
            break;

            case 'QAR':
            $index = 18;
            break;

            default:
            return "{null}";

        }

        if($index>11){

            $name = $xml->Currency[$index]->CurrencyName;
            $buying = $xml->Currency[$index]->ForexBuying;
            $selling = $xml->Currency[$index]->ForexSelling;

            return '{"Doviz":"'.$name.'","Alis":'.$buying.',"Satis":'.$selling.'}';

        }


        $name = $xml->Currency[$index]->CurrencyName;
        $buying = $xml->Currency[$index]->BanknoteBuying;
        $selling = $xml->Currency[$index]->BanknoteSelling;
        return '{"Doviz":"'.$name.'","Alis":'.$buying.',"Satis":'.$selling.'}';

    }





    public function getCurrencys(){
        $xml  = simplexml_load_file("http://www.tcmb.gov.tr/kurlar/today.xml");

           $array = '[';
           
           for($i=0; $i<19; $i++){

            if($i>11){
                $name = $xml->Currency[$i]->CurrencyName;
                $buying = $xml->Currency[$i]->ForexBuying;
                $selling = $xml->Currency[$i]->ForexSelling;
                $array .= '{"Doviz":"'.$name.'","Alis":'.$buying.',"Satis":'.$selling.'},<br>';
            }else{

                $name = $xml->Currency[$i]->CurrencyName;
                $buying = $xml->Currency[$i]->BanknoteBuying;
                $selling = $xml->Currency[$i]->BanknoteSelling;
            $array .= '{"Doviz":"'.$name.'","Alis":'.$buying.',"Satis":'.$selling.'},<br>';
            }
           }
           
          $array = trim($array,',<br>');
           
           return $array.']';


    }



}

?>