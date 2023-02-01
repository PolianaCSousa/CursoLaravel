# Exibindo o dono do evento na view - EXPLICANDO O CÓDIGO ATÉ AQUI 
O Jetstream é um pacote de autenticação do Laravel e o Liverwire são componentes gráficos (views) para que o Jetstream exiba as telas de login e cadastro.
<br>O Jetstream cuida da tabela de usuários, então ele cria e salva os dados do usuário sem que eu precise me preocupar com isso. Além disso o Blade tem diretivas de
autenticação @auth e de convidado @guest. Por meio delas podemos alterar a view para quem está logado e para quem não está.
<br>Eventos só podem ser criados para usuários logados no sistema (a diretiva @auth já verifica se o usuário está logado e ja redireciona o usuário se ele não estiver).
Ao se cadastrar, os dados do usuário são salvos na tabela users que tem o model User.
<br>Ao criar um evento, o id do usuário que está criando o evento é salvo na tabela de eventos como chave estrangeira, por esse motivo, é preciso que o usuário esteja
logado, pois é com o login que temos acesso às informaçoes dele por meio do model User que acessa a tabela users. 
<br>
