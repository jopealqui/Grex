<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<?php
$nome       = $_POST['nome'];
$email      = $_POST['email'];
$senha      = $_POST['senha'];
$data_nasc  = $_POST['data_nasc'];
$cnh        = $_POST['cnh'];
$rg         = $_POST['rg'];
$cpf        = $_POST['cpf'];
//$hash       = password_hash($senha, PASSWORD_DEFAULT);

$servername = "localhost:3306";
$username   = "root";
$password   = "JSkF{p@{oVp%=*3p";
$database   = "db_sc";

$conexao = mysqli_connect($servername, $username, $password, $database);

if (!$conexao)
{
     die("Conexão falhou: " . mysqli_connect_error());
}

echo "Conexão feita com sucesso";

$insert = "INSERT INTO motorista(Nome, Email, Senha, Data_nasc, CNH, RG, CPF) VALUES ('$nome', '$email', '$hash', '$data_nasc', '$cnh', '$rg', '$cpf')";
mysqli_query($conexao, $insert);
?>
</body>
</html>
