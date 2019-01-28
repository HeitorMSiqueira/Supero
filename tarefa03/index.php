<?php   

    /*
     * Tarefa 03 
     * Foi criado atributos para referenciar a conexao com o Banco de Dados.
     * Criado atribuito dbconn declarado como private.
     * Criado o metodo conectaBanco para realizar a conexao com o Banco 
     * no inicio da classe
     * No metodo getUserList faz uma chamada ao metodo conectaBanco com o objetivo
     * de utilizar a conexao com o banco ao realizar a consulta informada na
     * query.
     * 
     * O código foi adequeado ao PSR-2
     */
class MyUserClass
{
    
    var $user = 'user';
    var $password = 'password';
    var $host = 'localhost';
    private $dbconn;
 
public function conectaBanco()
    {
        if($this->dbconn == null){
            $this->dbconn = DatabaseConnection($this->host, $this->usuario, $this->password);
        }
    }

public function getUserList()  
    {   
        $this->conectaBanco();
        
        $results = $this->dbconn->query('select name from user');              
        sort($results);            
        return $results;   
    } 
}
