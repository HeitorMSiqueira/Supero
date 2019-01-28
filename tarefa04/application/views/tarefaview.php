<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8">
        <title>Tarefas</title>
        <link rel="stylesheet" href="<?= base_url('assets/scripts/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/scripts/grid/css/dataTables.bootstrap.css') ?>">
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/scripts/fieldset.css') ?>">
        <script src="<?= base_url('/assets/scripts/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('/assets/scripts/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('/assets/scripts/grid/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('/assets/scripts/dataTables.select.min.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
        <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
    </head>
    <body>
        <nav class="navbart">
            <div class="container-fluid col-lg-12" align="right">
                <br>
                <a onclick="Novo()" id="btn-novo-usuario" class="btn btn-primary ">
                    <span class="glyphicon glyphicon-file"></span>  NOVO 
                </a>
                <a onclick="Salvar()" id="btn-submit-form" class="btn btn-success ">
                    <span class="glyphicon glyphicon-floppy-disk"></span> SALVAR
                </a>
                <a onclick="Atualizar(0)" id="btn-atualiza-datatable" class="btn btn-info ">
                    <span class="glyphicon glyphicon-refresh"></span> ATUALIZAR
                </a>
            </div>
        </nav>
        <div class="container-fluid col-lg-12" align="center" >
            <h3 align="left">Cadastro de Tarefas</h3>
            <fieldset class="fieldset-border">
                <br>
            <form class="form-horizontal" method="POST" action="<?= base_url('api/tarefas') ?>" id="formTarefa">
                <table  style="width: 80%; border-collapse: collapse" cellpadding="0" cellspacing="5px" align="center" >
                    <tr>
                        <td  style="padding-right: 5px;font-size: 14px;" class="col-md-5">
                            <div class="form">
                                Título
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" readonly>
                            </div>
                        </td>
                        <td  style="padding-right: 5px;font-size: 14px;" class="col-md-4">
                            <div class="form">
                                Descrição
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" readonly>
                            </div>
                        </td>
                        <td  style="padding-right: 5px;font-size: 14px;" class="col-md-3">
                            <div class="form">
                                Prioridade
                                <select  id="prioridade" name="prioridade" class="form-control"  readonly >
                                    <option readonly value="0" selected="">Selecione</option>
                                    <option readonly value="1">1 - Alto</option>
                                    <option readonly value="2">2 - Médio</option>
                                    <option readonly value="3">3 - Baixo</option>
                                </select>
                            </div>
                        </td>
                    </tr>               
                </table>
            </form>
            </fieldset>

        </div>
<!--Grid-->
        <div class="col-lg-12">
            <hr/>
            <table id="grid" data-url="<?= base_url('api/tarefas') ?>" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-2">Título</th>
                        <th class="col-md-4">Descrição</th>
                        <th class="col-md-2">Prioridade</th>
                        <th class="col-md-2">Ações</th>
                    </tr>
                </thead>

            </table>
        </div>
<!--Grid-->
    </div>
</body>
</html>