# Informações Laravel
Aplicação desenvolvida com Laravel + MySQL utilizando docker:

# Documentação Laravel.
Utilizando como base de dados banco de dados MySQL (https://dev.mysql.com/doc/).

# Passo 1 - Informações sobre a aplicação
Clone do projeto pelo link Github
Copie o conteúdo do arquivo .env.example para .env utilizando o comando <code>cp .env.example .env</code>

# Passo 2 - docker-compose
Execute o comando <code>docker-compose up -d --build desafio</code>
Com o comando acima será feito a build do projeto desafio e agora estamos quase lá

# Passo 3 - rodando os container adicionais para manipular comandos Composer e Artisan
Neste projeto não  é necessário a instalação de programas ou recursos fora dos containers

Execute o comando do composer update <code>docker-compose run --rm composer update</code>
Execute o comando <code>docker-compose run --rm artisan make:controller TesteController --api --resource</code>

# Passo 4 - Executar scripts de banco

Para criar tabelas e colunas no banco de dados teste, execute os scripts 1 a 1 que se encontra na pasta scripts/scripts.sql na raiz do projeto.
Configuração para acesso ao container do banco de dados:

<code>DB_CONNECTION=mysql</code>
<code>DB_CONNECTION=mysql</code>
<code>DB_HOST=mysql</code>
<code>DB_PORT=3306</code>
<code>DB_DATABASE=homestead</code>
<code>DB_USERNAME=homestead</code>
<code>DB_PASSWORD=secret</code>

# Passo 5 - teste de endpoints

Para este teste, importe o arquivo insomnia.json, que se encontra na raiz do projeto. Lá estarão os endpoints com os cruds do projeto, criação de login, geração de token, etc.
