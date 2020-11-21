<?php
$nome          = $_POST['nome'];
$email         = $_POST['email'];
$senha         = $_POST['senha'];
$data_nasc     = $_POST['data_nasc'];
$limitacao     = $_POST['limitacao'];
$acompanhante  = $_POST['acompanhante'];

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

$insert = "INSERT INTO usuario(Nome, Email, Senha, Data_nasc, Limitacao, Acompanhante) VALUES ('$nome', '$email', '$senha', '$data_nasc', '$limitacao', '$acompanhante')";
mysqli_query($conexao, $insert);
?>