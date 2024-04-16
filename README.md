# Teste de conhecimentos PHP + Banco de dados

## Sobre o Projeto
O Teste de conhecimentos PHP + Banco de dados é uma aplicação web desenvolvida em PHP, utilizando PHP 8.2, jQuery, Bootstrap e o banco de dados SQLite. A aplicação segue a arquitetura MVC (Model-View-Controller) e foi executada localmente através do servidor web.

### Requisitos
- PHP 8.2 ou superior;
```
apt install php
```
- Extensão do SQlite para o Php.
``` 
apt install php-sqlite3
```
- Servidor web (Apache, Nginx, etc.)

### Instalação
- Clone o repositório do GitHub: 
```
git clone https://github.com/pedroaugustobt/prova-php-entrevista.git
```
- Navegue até o diretório do projeto
- Execute a aplicação através do servidor web local.

### Estrutura do Projeto
- `app/`: Contém as classes PHP da aplicação, organizadas em subdiretórios:
  - `config/`: Configurações da aplicação.
  - `controllers/`: Controladores da aplicação seguindo o padrão MVC.
  - `models/`: Modelos de dados da aplicação.
  - `views/`: Visualizações da aplicação, organizadas em subdiretórios:
    - `color/`: Visualizações relacionadas às cores.
    - `user/`: Visualizações relacionadas aos usuários.
- `core/`: Contém arquivos essenciais da aplicação, como a classe `Connection.php` e o arquivo do banco de dados.
- `public/`: Contém recursos públicos acessíveis através do navegador:
  - `css/`: Arquivos de estilo CSS.
  - `js/`: Arquivos JavaScript.
  - `index.php`: Ponto de entrada da aplicação.

### Uso
- Inicie o servidor web local.
- Acesse o projeto em seu navegador:
```
http://localhost/seu-caminho/public/index.php
```
- Ao acessar a interface, você pode Adicionar, Editar, Gerenciar Cores ou Excluir o usuário.
- Há uma validação onde você não pode Adicionar o mesmo email de um usuário já existente, isso se aplica no Editar.
- Você pode Adicionar um usuário definindo ou não se ele tem uma Cor vinculada ao seu `id`.