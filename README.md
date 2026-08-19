#Sistema de Gerenciamento de Pratos#
Sobre o projeto

Sistema desenvolvido em PHP e MySQL para realizar o cadastro de usuários e o gerenciamento de pratos de um restaurante.

Cada prato cadastrado está relacionado a um usuário responsável pelo cadastro.

Funcionalidades
Cadastro de usuários
Cadastro de pratos
Listagem de pratos
Identificação do usuário responsável pelo cadastro
Edição de pratos
Exclusão de pratos
Listagem de pratos por usuário
Validação de campos obrigatórios
Uso de Prepared Statements

Tecnologias utilizadas
PHP
MySQL
HTML
CSS
XAMPP

Banco de dados

O sistema possui duas tabelas principais:

usuarios

Armazena os usuários responsáveis pelo cadastro.

id
nome
email
pratos

Armazena os pratos cadastrados.

id
nome
descricao
preco
categoria
usuario_id

A coluna usuario_id cria o relacionamento entre as tabelas, permitindo identificar qual usuário cadastrou cada prato.

Segurança

As operações que recebem dados externos utilizam Prepared Statements.

Exemplo:

$sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $nome, $email);

$stmt->execute();

Isso ajuda a evitar SQL Injection.
