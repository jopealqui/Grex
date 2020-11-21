<?php
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$senha      = $_POST['senha'];
$data_nasc  = $_POST['data_nasc'];
$cnh        = $_POST['cnh'];
$rg         = $_POST['rg'];
$cpf        = $_POST['cpf'];

$servername = "localhost:3306";

$username = "root";

$password = "";

$database = "db_sc";

// Criando a conexao

$conexao = mysqli_connect($servername, $username, $password, $database);

// verificando a conexao

if (!$conexao)
{
     die("Conexão falhou: " . mysqli_connect_error());
}

 
echo "Conexão feita com sucesso";

$insert = "INSERT INTO motorista(Nome, Email, Senha, Data_nasc, CNH, RG, CPF) VALUES ('$nome', '$email', '$senha', '$data_nasc', '$cnh', '$rg', '$cpf')";
mysqli_query($conexao, $insert);
?>