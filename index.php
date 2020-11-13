<?php

//EXAMPLE
/*
$obj = new Cep('059999-98');
$obj->setIntervalo([01.000001, 05.999999, 08.000000, 08.499999, 09.000001, 09.299999, 09.600001, 09.899999, 09.500001, 09.599999, 07.000001, 07.399999, 07.400001, 07.499999, 06.700001, 06.729999]);

if ($obj->verificarCepNoIntervalo()) {
    echo 'é valido';
} else {
    echo 'não é válido';
}
*/

class Cep
{
    private $cepIntervalo;
    private $valido = false;
    private $cep;

    /**
     * Constructor of class verifica.
     *
     * @param mixed $cep
     * @param mixed $cepValido
     */
    public function __construct(string $cep)
    {
        $this->setCep($cep);
    }

    /**
     * Set the value of intervalo cep.
     */
    public function setIntervalo(array $intervalo)
    {
        return $this->cepIntervalo = $intervalo;
    }

     /**
     * Get the value of getIntervalo
     */
    private function getIntervalo()
    {
        return $this->cepIntervalo;
    }

    /**
     * Get the value of cep.
     */
    private function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep.
     *
     * @param mixed $cep
     *
     * @return self
     */
    private function setCep($cep)
    {   
        //Attribute sanitizer and validation
        if (null != $cep || $cep <= 0) {
            $string = (string) $cep;
            $string = preg_replace('/[^0-9]/', '', $cep);
            $string = str_split($string);
            array_splice($string, 2, 0, '.');
            $string = implode('', $string);
            $cep = (float) $string;
        }
        $this->cep = $cep;
    }

    /**
     * This function verifies if the $cep(String) exists in a determined static interval set in the array $cepValido.
     * It checks each pair.
     *
     * @param mixed $cep
     */
    public function verificarCepNoIntervalo()
    {
        //Loop for checking the entire array
        $intervalos = $this->getIntervalo();
        for ($c = 0; $c < count($intervalos); $c += 2) {
            if ($this->getCep() >= $intervalos[$c] && $this->getCep() <= $intervalos[$c + 1]) {
                $this->valido = true;
            }
        }

        return $this->valido;
    }
}
