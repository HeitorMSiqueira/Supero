Teste de conhecimentos de desenvolvimento em PHP.
Autor: HEITOR MANOEL SIQUEIRA, JANEIRO 2019.

Olá,

As pastas com nome tarefa 01 a 04, refere-se as respectivas taferas solicitadas. 

Para executar as tarefas, estas 4 pastas devem ser colocadas dentro da pasta htdocs do XAMPP, servidor este que uso para rodar minhas aplicações PHP.

Exemplo:
../htdocs/tarefa04


-----------

	TAREFA 01 - Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima “Fizz” 
				em vez do número e para múltiplos de 5 imprima “Buzz”. 
				Para números múltiplos de ambos (3 e 5), imprima “FizzBuzz”.

		Foi usado um Laço (For) para a impressão dos número de 1 a 100. 
		Rrealizando comparações para verificar se os números são múltiplos de 3, 5 ou ambos.
		Para executar do arquivo coloque a pasta TAREFA01 dentro da pasta htdocs do XAMPP, servidor este que uso para rodar minhas aplicações PHP.


-----------
	TAREFA 02 - Refatore o código, fazendo as alterações que julgar necessário.
	
		Realizado adequação no codigo:
		Criado uma funcao para redirecionamento.
		O código adequeado ao PSR-2.

		
-----------		
	TAREFA 03 - Refatore o código, fazendo as alterações que julgar necessário.
	
		Foi criado atributos para referenciar a conexao com o Banco de Dados.
		Criado atribuito dbconn declarado como private.
		Criado o metodo conectaBanco para realizar a conexao com o Banco no inicio da classe
		No metodo getUserList faz uma chamada ao metodo conectaBanco com o objetivo de utilizar a conexao com o banco ao realizar a consulta informada na query.


	
-----------	
	TAREFA 04 - Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão). 
				As tarefas consistem em título e descrição, ordenadas por prioridade.
				
		Importante: Dentro da pasta da TAREFA04, esta o arquivo "tarefas_bd.sql", este arquivo contem a base de dados MySQL utilizada para rodar esta tarefa, é necessário importar
		Caso necessario, realizar ajuste das informações de conexao no arquivo "database.php" que fica em: ..tarefa04\application\config\database.php.

		Acessando aplicação:

		Ao clicar no botão "NOVO" o usuário pode inserir um nova tarefa, adicionando o título, descrição, prioridade, estes campos são obrigatórios.
	  
		Finaliza-se a inserção clicando no botao "SALVAR". Ao salvar, a tarefa será salvo no banco de dados e apresentada na Grid.
	  
		As tarefas são apresentadas em uma grid, onde é possível escolher mostrar 5, 10, 20, 50 ou 100 resultados na primeira página.
		
		Na Grid tambem existe o campo de pesquisar para facilitar a consulta de alguma tarefa já salva.
	  
		Cada tarefa apresentada na grid:
				
				Tem um botão de "EDITAR", onde pode alterar os dados da tarefa. Confirmando as alterações ao clicar no botão "SALVAR".

				Tem um botão de "EXCLUIR" ao clicar, abre um pop-up para realizar a confirmação da exclusão, com o objetivo de evitar uma exclusão acidental.
				
				Clicando em OK para confimar a exclusão e Cancelar para Sair.
	  
		O processo de Inserir, Editar ou Excluir uma Tarefa, ao efetivar a ação, a grid será atualizada.
	  
		O botao "ATUALIZAR", faz uma limpeza dos campos em tela, deixando desativados e "sem valor" e atualiza a grid.
		
	
	
  
  
  
  
  
  
  
  
  
  
  
  
  
  