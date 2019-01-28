<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }

    
    //Método que irá listar todos os usuários recebe como parâmetro os campos a serem retornados
   public function GetAll($fields = null) {
        $this->db->select($fields)
                ->from('tarefas_tab')
                ->order_by('prioridade');

        return $this->db->get()->result_array();
    }
    
    //Método que irá listar todos os usuários recebe como parâmetro os campos a serem retornados
    public function GetById($id, $fields = '*') {
        if ($id <= 0) {
            return array();
        }
        $this->db->select($fields)
                ->from('tarefas_tab')
                ->where('id', $id)
                ->order_by('prioridade', 'ASC');

        return $this->db->get()->result_array();
    }

    /*
     * Método que irá fazer a validação dos dados e processar o insert na tabela
     * recebe como parâmetro o array com os dados vindos do formulário
     */
    function Insert($dados) {
        if (!isset($dados)) {
            $response['status'] = false;
            $response['message'] = "Dados não informados.";
        } else {          
                //executamos o insert
                $status = $this->db->insert('tarefas_tab', $dados);
                // verificamos o status do insert
                if ($status) {
                    $response['status'] = true;
                    $response['message'] = "Tarefa inserida com sucesso.";
                } else {
                    $response['status'] = false;
                    $response['message'] = $this->db->error_message();
                }
           
        }
        // retornamos as informações sobre o insert
        return $response;
    }
    
    /*
     * Método que irá fazer a validação dos dados e processar o update na tabela
     * recebe como parâmetro o array com os dados vindos do formulário
     */
    function Update($field, $value, $dados) {
        if (!isset($dados) || !isset($field) || !isset($dados)) {
            $response['status'] = false;
            $response['message'] = "Dados não informados.";
        } else {
            //executamos o update
            $this->db->where($field, $value);
            $status = $this->db->update('tarefas_tab', $dados);
            // verificamos o status do insert
            if ($status) {
                $response['status'] = true;
                $response['message'] = "Tarefa atualizada com sucesso.";
            } else {
                $response['status'] = false;
                $response['message'] = $this->db->error_message();
            }
            
        }
        // retornamos as informações sobre o update
        return $response;
    }
    
    /*
     * Método que irá fazer a remoção dos dados
     * Recebe como parâmetro o campo e o valor a serem usados na cláusula where
     */
    function Delete($field, $value) {
        if (is_null($field) || is_null($value)) {
            $response['status'] = false;
            $response['message'] = "Dados não informados.";
        } else {
            // definimos o campo que é o parâmetro para remoção
            $this->db->where($field, $value);
            // removemos o registro e armazenamos o status do procedimento
            $status = $this->db->delete('tarefas_tab');
            // verificamos o status do procedimento de remoção
            if ($status) {
                $response['status'] = true;
                $response['message'] = "Tarefa removida com sucesso.";
            } else {
                $response['status'] = false;
                $response['message'] = $this->db->error_message();
            }
        }
        // retornamos as informações sobre o status do procedimento
        return $response;
    }

}
