# sisfrete

Olá! Tudo certo? Meu nome é Gabriel Henrique Borges da Costa, estarei apresentando o meu projeto para a atividade avaliativa da SISFRETE!  

**Objetivo**: Criar um sistema de agendamento onde é possível cadastrar um agendamento e edita-lo. Caso seja usuário administrador, além de cadastrar e editar, ele poderá apagar os agendamentos e consultar um relatório de agendamentos. 

**Ferramentas utilizadas**: Visual Studio Code, Wampserver 

**Linguagens utilizadas**: PHP, HTML e CSS 

**Utilizando o Wampserver para rodar o projeto**: Copie e cole os arquivos na pasta "www" do wampserver, execute-o e clique em localhost!. Para abrir o banco de dados, basta clicar em phpmyadmin (*utilizador*: root, *a senha é vazia*)

------------------------------------------------------------------------------------------------------ 

_Tela de login do sistema_: 

![tela_login](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/tela_inicio.png?raw=true)
 
A verificação de login é feita através de um SELECT na tabela users. 

_Pagina de cadastro_: 
 
![cadastro_user](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/cadastro_user.png?raw=true) 

A inserção é feita através de um INSERT na tabela users. 

![bd_users](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/bd_users.png?raw=true) 

Você é levado para uma pagina painel quando logado (se for administrador, é levado para a pagina de controle).

+***+=USUÁRIO COMUM=+***=

_Painel_:

![painel.png](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/painel.png?raw=true) 

É possível cadastrar um novo agendamento clicando no botão **“Cadastrar novo agendamento”**, esse cadastro usa um INSERT pra inserir as informações na tabela agenda.

*Cadastro de agendamento*:

![cadastro.png](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/cadastro.png?raw=true)

É possível também editar o agendamento cadastrado selecionando o radio ao lado do agendamento e clicando em **“Editar Agendamento”**. 

*Editar agendamento*:

![editar.png](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/editar.png?raw=true)

Você pode deslogar clicando no botão de **"Sair"**.

+***+=USUÁRIO ADMINISTRADOR=+***=

Como mencionado anteriormente, temos a tela de administração chamada de Sala de Controle. O administrador foi cadastrado no banco com a ‘permissao’ definida como 1, para que haja diferenciação com o resto dos usuários. A página traz todos os agendamentos cadastrados, oferece a possibilidade de buscar os agendamentos cadastrados por período, além das funções de cadastrar um novo agendamento, editar e/ou apagar um agendamento.

*login adm*: adm
*senha*: adm

![adm.png](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/adm.png?raw=true) 

Você pode apagar um agendamento clicando no botão de **"Apagar"** presente ao lado do agendamento.  

É possível realizar uma busca de agendamentos dentro de determinado período de tempo, basta selecionar duas datas e o sistema trará as informações desejadas! 

![relatorio_adm](https://github.com/gabrielhbcosta/sisfrete/blob/main/imgs/relatorio_adm.png?raw=true) 
 
-----------------------------------------------------------------------------------------------------------

Muito obrigado! 
