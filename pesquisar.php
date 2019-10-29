<?php

require_once('BD.php');

$nome = $_POST['nome'];
$con = new BD();
$dados = $con->pesquisarDados($nome);

echo json_encode($dados)

?>