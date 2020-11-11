<?php

//For debug purposes
$obj = new verifica();

$valido = $obj->verificaCep('01.29#3@8-9');

if ($valido) {
    echo 'é valido';
} else {
    echo 'não é válido';
}

class verifica
{
    private $cep = 0;

    private $cepValido = [01.000001, 05.999999, 08.000000, 08.499999, 09.000001, 09.299999, 09.600001, 09.899999, 09.500001, 09.599999, 07.000001, 07.399999, 07.400001, 07.499999, 06.700001, 06.729999];
    private $valido = false;

    /**
     * Constructor of class verifica.
     *
     * @param mixed $cep
     * @param mixed $cepValido
     */
    public function contructorVerifica($cep, $cepValido)
    {
        $this->cep = $cep;
        $this->cepValido = $cepValido;
    }

    /**
     * Get the value of cepValido.
     */
    public function getCepValido()
    {
        return $this->cepValido;
    }

    /**
     * Set the value of cepValido.
     *
     * @param mixed $cepValido
     *
     * @return self
     */
    public function setCepValido($cepValido)
    {
        $this->cepValido = $cepValido;

        return $this;
    }

    /**
     * Get the value of cep.
     */
    public function getCep()
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
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * This function verifies if the $cep(String) exists in a determined static interval set in the array $cepValido.
     * It checks each pair.
     *
     * @param mixed $cep
     */
    public function verificaCep($cep)
    {
        //Verifies if cep is a string

        try {
            if ('string' != gettype($cep)) {
                throw new Exception("{$cep} is not a String");
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        //Attribute sanitizer and validation
        if (null != $cep || $cep <= 0) {
            $string = (string) $cep;
            $string = preg_replace('/[^0-9]/', '', $cep);
            $string = str_split($string);
            array_splice($string, 2, 0, '.');
            $string = implode('', $string);
            $cep = (float) $string;
        }

        //Loop for checking the entire array
        for ($c = 0; $c < count($this->cepValido); $c += 2) {
            if ($cep >= $this->cepValido[$c] && $cep <= $this->cepValido[$c + 1]) {
                $this->valido = true;
            }
        }

        return $this->valido;
    }
}
