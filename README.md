# Atividade 7 - README

Este projeto contém scripts para operações CRUD utilizando PHP e MySQL.

## Como rodar no XAMPP

1. **Instale o XAMPP**: Baixe e instale o [XAMPP](https://www.apachefriends.org/index.html).
2. **Inicie os serviços**: Abra o painel do XAMPP e inicie o Apache e o MySQL.
3. **Coloque os arquivos**: Copie a pasta do projeto para `C:\xampp\htdocs\[nome_da_pasta]\Atividade7`.

## Como configurar a conexão com o banco

1. **Crie o banco de dados**:
    - Acesse `http://localhost/phpmyadmin`.
    - Crie o banco de dados, presente em: `db.sql`.
2. **Configure o arquivo de conexão**:
    - Edite o arquivo `db.php` com os seus dados (abaixo são os valores padrão):
      ```php
        $servername = "localhost";
        $username = "root";
        $password = "[sua_senha]";
        $dbname = "biblioteca_crud";

        $conn = new mysqli($servername, $username, $password, $dbname);
      ```
    - Ajuste conforme necessário.

## Como executar os scripts

- Acesse os scripts via navegador (após iniciar o xamp com 'Apache' e 'MySQL'):
  - index.php: Aba inicial onde insridos as demais funcionalidades de CRUD.

## Como testar cada CRUD

1. **Create (Criar)**: Preencha o formulário em `create.php` e envie para adicionar um registro.
2. **Read (Ler)**: Acesse `read.php` para visualizar os registros cadastrados.
3. **Update (Atualizar)**: Use o formulário em `update.php` para modificar um registro existente.
4. **Delete (Deletar)**: Utilize `delete.php` para remover um registro do banco.

## Estrutura

```Estrutura

ATIVIDADE7/
├── public/
│   ├── autor/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── read.php
│   │   └── update.php
│   ├── emprestimo/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── read.php
│   │   └── update.php
│   ├── leitor/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── read.php
│   │   └── update.php
│   ├── livro/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── read.php
│   │   ├── update.php
│   │   └── db.php
│   └── styles/
│       └── style.css
├── db.sql
├── estrutura.txt
├── index.php
└── readme.md

```

---