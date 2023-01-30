# CursoLaravel
ADICIONANDO JSON NO BD
Nessa aula foi incluído no formulário de criação de eventos, os itens que o usuário deseja ter no evento.
No Banco de Dados, é preciso salvar esses itens em forma de array. Esse é o "JSON" que foi salvo.
Para que o Laravel reconheça os itens que vieram do formulário como um array, foi feito um casting no model, onde $items passa a ser tratado como um array
