<?php
$modelo    = $_POST['modelo'];
$ano       = $_POST['ano'];
$placa     = $_POST['placa'];
$assentos  = $_POST['assentos'];
$cor       = $_POST['cor'];

$servername = "localhost:3306";

$username = "root";

$password = "";

$database = "db_sc";

// Criando a conexao

$conexao = mysqli_connect($servername, $username, $password, $database);

// verificando a conexao

if (!$conexao)
{
     die("Conexão falhou: ".mysqli_connect_error());
}

echo "Conexão feita com sucesso";

$insert = "INSERT INTO carro(Modelo, Ano, Placa, Lugares, Cor) VALUES ('$modelo', '$ano', '$placa', '$assentos', '$cor')";
mysqli_query($conexao, $insert);
?>