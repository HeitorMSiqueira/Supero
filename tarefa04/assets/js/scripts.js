////////////////////////////////////
//  Tarefa 04                     //
//  Realizada por Heitor Siqueira //
//  26/01/2018                    //
////////////////////////////////////

$(document).ready(function () {
    Grid();
});

function Grid() {
    var api_url = location.protocol + "//" + location.host + "/tarefa04/api/tarefas";
    $('#grid').DataTable({
        "destroy": true,
        "order": [[3, "asc"]],
        ajax: {
            "url": api_url,
            "type": "GET",
        },
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json'
        },
        "columns": [
            {"data": "id"},
            {"data": "titulo"},
            {"data": "descricao"},
            {"render": function (data, type, row) {
                    if (row.prioridade == "1") {
                        return "1 - Alto";
                    } else if (row.prioridade == "2") {
                        return "2 - Médio";
                    } else {
                        return "3 - Baixo";
                    }
                }
            },
            {"render": function (data, type, row) {
                    return "<a onclick='Editar(" + row.id + ")' class='btn btn-warning'> <span class='glyphicon glyphicon-edit'></span> EDITAR</a>\n\
                            <a onclick='Excluir(" + row.id + ")' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> EXCLUIR</a>";                    
                },
            },            
        ],
        searching: true
    });
}

function Novo() {
    $('#titulo').val('').attr('readonly', false);
    $('#descricao').val('').attr('readonly', false);
    $('#prioridade').val(0).attr('readonly', false);
}

function Salvar() {    
    var validacao = 'S';    
    if($('#titulo').val() == ""){
        var validacao = 'N';
    }
    if($('#descricao').val() == ""){
        var validacao = 'N';
    }
    if($('#prioridade').val() == 0){
         var validacao = 'N';
    }   
    if(validacao == 'S'){
        //debugger;
        var url_action = $('#formTarefa').attr('action');
        var form_data = $('#formTarefa').serialize();
        var form_method = $('#formTarefa').attr('method');
        $.ajax({
            url: url_action,
            data: form_data,
            dataType: 'json',
            method: form_method,
            success: function (response) {
                Mensagem('Informação', response.message);
                Atualizar(form_method);
                           
            },
            error: function (response) {
                Mensagem('Atenção', response.responseJSON.message);                
            }
        });
    }
    else{
        Mensagem('Atenção', 'Título, Descrição e Prioridade são Obrigatórios');
    }
}

function Excluir(tarefas_id) {
    var confirmacao = confirm('Deseja realmente excluir?');
    if (confirmacao) {
        var api_url = location.protocol + "//" + location.host + "/tarefa04/api/tarefas/" + tarefas_id;
        $.ajax({
            url: api_url,
            type: 'DELETE',
            dataType: 'json',
            success: function (response) {
                Mensagem('Informação', response.message);
                Atualizar(0);
                       
            },
            error: function (response) {
                Mensagem('Atenção', response.responseJSON.message);
            }
        });
    }
}

/* Função criada para poder exibir as mensagens de sucesso ou erro */
function Mensagem(title, message) {
    var dialog = bootbox.dialog({
        title: title,
        message: message,
        backdrop: true
    });
    dialog.init(function () {
        setTimeout(function () {
            dialog.modal('hide');
        }, 2000);
    });
}

// Função criada para manipular o formulário, inserindo os dados do usuário para edição
function Editar(tarefas_id) {
    if (tarefas_id === undefined) {
        Mensagem('Atenção', 'Tarefa não selecionada.');
        return false;
    }
    var api_url = location.protocol + "//" + location.host + "/tarefa04/api/tarefas/" + tarefas_id;
    $.ajax({
        url: api_url,
        dataType: 'json',
        method: "GET",
        success: function (response) {         
            $('#formTarefa').attr('method', 'PUT');
            $('#formTarefa').attr('action', api_url);
            $('#formTarefa #titulo').val(response.data[0].TITULO).attr('readonly', false);
            $('#formTarefa #descricao').val(response.data[0].DESCRICAO).attr('readonly', false);
            $('#formTarefa #prioridade').val(response.data[0].PRIORIDADE).attr('readonly', false);
            return false;
        },
        error: function (response) {
            Mensagem('Atenção', response.responseJSON.message);
            return false;
        }
    });
}

// Função que irá executar o reset do formulário, voltando os seus campos e configurações para o estado inicial
function Atualizar(form_method) {
    if (form_method == "PUT") {
        var api_url = location.protocol + "//" + location.host + "/tarefa04/api/tarefas";
        $('#formTarefa').attr('method', 'POST');
        $('#formTarefa').attr('action', api_url);
        $('#formTarefa #titulo').val('').attr('readonly', true);
        $('#formTarefa #descricao').val('').attr('readonly', true);
        $('#formTarefa #prioridade').val(0).attr('readonly', true);
        $('#formTarefa')[0].reset();
        Grid();
    } else {
        $('#formTarefa #titulo').val('').attr('readonly', true);
        $('#formTarefa #descricao').val('').attr('readonly', true);
        $('#formTarefa #prioridade').val(0).attr('readonly', true);
        $('#formTarefa')[0].reset();
        Grid();
    }
}

