<?php

    /* Tarefa 01
     * Escreva um programa que imprima números de 1 a 100. 
     * Mas, para múltiplos de 3 imprima “Fizz” em vez do número e
     * para múltiplos de 5 imprima “Buzz”. 
     * Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.
     * 
     * O código foi adequeado ao PSR-2
    */


class FizzBuzz 
{
    public function imprimindo() 
    {
        $r = '';
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $r .= "FizzBuzz <br>";
            } elseif ($i % 3 == 0) {
                $r .= "Fizz <br>";
            } elseif ($i % 5 == 0) {
                $r .= "Buzz <br>";
            } else {
                $r .= $i . '<br>';
            }
        }

        return $r;
    }
}

$tarefa1 = new FizzBuzz;
echo $tarefa1->imprimindo();
