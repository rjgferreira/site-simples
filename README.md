Projeto 4 - Site simples em PHP

        - Criar uma área restrita (acesso por login e senha).
        - Acesso a listagem para edição de todas as páginas.
        - Utilizar um editor online (TinyMCE)
        - Se um usuário não autenticado acessar a URL de administração, ele deverá ser redirecionado para uma tela de login para ele se autenticar.
        - Informações de autenticação gravadas no banco de forma segura.
        - Fixture atualizada para adicionar o usuário e senha (usuário padrão admin, senha admin).


Projeto 3 - Site simples em PHP

- Alterarndo a estrutura do site para não mais incluir as páginas com "require", mas sim, buscando as informações no banco de dados
- Implementação de uma fixture (fnc/fixture.php) que cria a tabela e insere os dados-padrão para funcionamento do site
- Inclusão de um sistema de pesquisa, que lista resultados e, ao clicar num deles, redireciona o usuário para a página correspondente

Projeto 2 - Site simples em PHP

        - Verificar sempre se o arquivo acessado existe
        - Apresentar uma mensagem de erro 404 em caso de url inválida
        - Criar função para fazer a verificação das rotas
        - Registrar cada uma das rotas em um array
        * Usando função anônima
