<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Tarefas extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tarefas_model', 'TarefasMDL');
    }

    //Essa função vai responder pela rota /api/tarefas sob o método GET
    public function index_get() {

        // Recupera o ID diretamente da URL
        $id = (int) $this->uri->segment(3);
        // Valida o ID
        if ($id <= 0) {
            // Lista as Tarefas
            $tarefa = $this->TarefasMDL->GetAll('id, titulo, descricao, prioridade');
        } else {
            // Lista os dados da Tarefa conforme o ID solicitado
            $tarefa = $this->TarefasMDL->GetById($id);
        }

        // verifica se existem usuários e faz o retorno da requisição
        if ($tarefa) {
            $response['data'] = $tarefa;
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $this->response(null, REST_Controller::HTTP_NO_CONTENT);
        }
    }

    //Essa função vai responder pela rota /api/tarefas sob o método POST
    public function index_post() {
        // recupera os dados informado no formulário
        $tarefa = $this->post();
        // processa o insert no banco de dados
        $insert = $this->TarefasMDL->Insert($tarefa);
        // define a mensagem do processamento
        $response['message'] = $insert['message'];
        // verifica o status do insert para retornar o cabeçalho corretamente e a mensagem
        if ($insert['status']) {
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Essa função vai responder pela rota /api/tarefas sob o método POST
    public function index_put() {
        // recupera os dados informado no formulário
        $tarefa = $this->put();
        $tarefa_id = $this->uri->segment(3);
        // processa o update no banco de dados
        $update = $this->TarefasMDL->Update('ID', $tarefa_id, $tarefa);
        // define a mensagem do processamento
        $response['message'] = $update['message'];

        // verifica o status do update para retornar o cabeçalho corretamente e a mensagem
        if ($update['status']) {
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Essa função vai responder pela rota /api/tarefas sob o método DELETE
    public function index_delete() {
        // Recupera o ID diretamente da URL
        $id = (int) $this->uri->segment(3);
        // Valida o ID
        if ($id <= 0) {
            // Define a mensagem de retorno
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
        }
        // Executa a remoção do registro no banco de dados
        $delete = $this->TarefasMDL->Delete('id', $id);

        // define a mensagem do processamento
        $response['message'] = $delete['message'];
        // verifica o status do insert para retornar o cabeçalho corretamente e a mensagem
        if ($delete['status']) {
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
        }
    }

}
