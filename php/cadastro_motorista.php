<?php
    include_once('conexao.php');

    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $senha      = $_POST['senha'];
    $data_nasc  = $_POST['data_nasc'];
    $cnh        = $_POST['cnh'];
    $rg         = $_POST['rg'];
    $cpf        = $_POST['cpf'];

    $insert = "INSERT INTO motorista(Nome, Email, Senha, Data_nasc, Cidade, CNH, RG, CPF) VALUES ('$nome', '$email', '$senha', '$data_nasc', '$cnh', '$rg', '$cpf')";
    mysqli_query($conexao, $insert);
?>