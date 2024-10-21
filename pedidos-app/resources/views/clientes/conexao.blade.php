<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'laravel_db');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

if (!$conexao) {
    die('Erro na conexão: ' . mysqli_connect_error());
}
echo 'Conectado com sucesso!';
?>
