<?php
    
    /*
     * Tarefa 02
     * Realizado adequaзгo no codigo:
     * Criado uma funcao para redirecionamento.
     * O cуdigo adequeado ao PSR-2.     
    */

function sessao()
{
    header("Location: http://www.google.com");
    exit();
}


$session = (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true);
$cookie = (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true);

if($session || $cookie){
    return sessao(); 
}
 