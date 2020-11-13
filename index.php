<?php

//EXAMPLE

$obj = new Cep('09399999');
$obj->setIntervalo(['01000001', '05999999',
    '08000000', '08599999',
    '09000001', '09399999',
    '09600001', '09899999',
    '09500001', '09599999',
    '07000001', '07399999',
    '07400001', '07499999',
    '06700001', '06729999', ]);

if ($obj->verificarCepNoIntervalo()) {
    echo 'é valido';
} else {
    echo 'não é válido';
}

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
     * Set the value of $cepIntervalo.
     */
    public function setIntervalo(array $intervalo)
    {
        //Sanitizes and transform array type string to int
        for ($c = 0; $c < count($intervalo); ++$c) {
            $string = (string) $intervalo[$c];
            $string = preg_replace('/[^0-9]/', '', $intervalo[$c]);
            $intervalo[$c] = (int) $string;
        }

        return $this->cepIntervalo = $intervalo;
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

    /**
     * Get the value of getIntervalo.
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
            $cep = (int) $string;
        }
        $this->cep = $cep;
    }
}
