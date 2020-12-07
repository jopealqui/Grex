<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<?php
$modelo    = $_POST['modelo'];
$ano       = $_POST['ano'];
$placa     = $_POST['placa'];
$assentos  = $_POST['assentos'];
$cor       = $_POST['cor'];

$servername = "localhost:3306";
$username = "root";
$password = "JSkF{p@{oVp%=*3p";
$database = "db_sc";

$conexao = mysqli_connect($servername, $username, $password, $database);

if (!$conexao)
{
     die("Conexão falhou: ".mysqli_connect_error());
}

echo "Conexão feita com sucesso";

$insert = "INSERT INTO carro(Modelo, Ano, Placa, Lugares, Cor) VALUES ('$modelo', '$ano', '$placa', '$assentos', '$cor')";
mysqli_query($conexao, $insert);
?>
</body>
</html>
