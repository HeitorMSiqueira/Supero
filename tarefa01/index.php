<?php

    /* Tarefa 01
     * Escreva um programa que imprima n�meros de 1 a 100. 
     * Mas, para m�ltiplos de 3 imprima �Fizz� em vez do n�mero e
     * para m�ltiplos de 5 imprima �Buzz�. 
     * Para n�meros m�ltiplos de ambos (3 e 5), imprima �FizzBuzz�.
     * 
     * O c�digo foi adequeado ao PSR-2
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
