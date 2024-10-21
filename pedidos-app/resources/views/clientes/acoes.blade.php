<?php
session_start();
require 'conexao.php';

if (isset($_POST['create'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO clientes (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $SESSION['mensagem'] = 'Cliente criado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $SESSION['mensagem'] = 'Cliente não foi criado';
        header('Location: index.php');
        exit;
    }
}