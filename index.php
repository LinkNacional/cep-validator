<?php

$obj = new verifica();

$valido = $obj->verificaCep(55.440000);

if($valido){
    echo "é valido";
}else{
    echo "não é válido";
}

class verifica{

    private $cep=0;
    
    private $cepValido = array(01.000001, 05.999999,08.000000, 08.499999, 09.000001, 09.299999, 09.600001, 09.899999, 09.500001, 09.599999, 07.000001, 07.399999, 07.400001, 07.499999, 06.700001, 06.729999);
    private $valido=false;
    
    function contructorVerifica($cep, $cepValido){
        $this->cep = $cep;
        $this->cepValido = $cepValido;
    }

    function getCep(){
        return $this->cep;
    }

    function getValido(){
        return $this->cep;
    }

    function getCepValido(){
        return $this->cepValido;
    }

    function setCep($cep){
        $this->cep = $cep;   
    }

    function verificaCep($cep){
        if($cep >= $this->cepValido[0] && $cep <= $this->cepValido[1]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[2] && $cep <= $this->cepValido[3]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[4] && $cep <= $this->cepValido[5]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[6] && $cep <= $this->cepValido[7]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[8] && $cep <= $this->cepValido[9]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[10] && $cep <= $this->cepValido[11]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[12] && $cep <= $this->cepValido[13]){
            $this->valido = true;
        }
        if($cep >= $this->cepValido[14] && $cep <= $this->cepValido[15]){
            $this->valido = true;
        }

        return $this->valido;
    }

}

?>