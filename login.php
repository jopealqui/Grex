<?php
  $servername = "localhost:3306";
  $username   = "root";
  $password   = "";
  $database   = "db_sc";

  $conexao = mysqli_connect($servername, $username, $password, $database);

  $senha   = $_POST['senha'];
  $email   = $_POST['email'];

  $consultaU    = "SELECT senha FROM usuario WHERE email = '$email'";
  $consultaM    = "SELECT senha FROM motorista WHERE email = '$email'";
  $hashU        = mysqli_query($conexao, $consultaU);
  $hashM        = mysqli_query($conexao, $consultaM);
  $fetch_arrayU = mysqli_fetch_array($hashU);
  $rowU         = implode ("", $fetch_arrayU);
  $fetch_arrayM = mysqli_fetch_array($hashM);
  $rowM         = implode ("", $fetch_arrayM);

  $pass = '$2y$10$D9.rDCkA5zGzffxNgPuGt.mHgTZJ2ycMLsJisZKffOPC9z.Ynt2Pu';

  $decrypt =  password_verify('senha', $pass);

  if ($decrypt)
  {
    header('Location: pagina_motorista.html');
  }/*
  elseif(password_verify($senha, $rowU))
  {
    header('Location: pagina_usuario.html');
  }*/
  else
  {
    header('Location: pagina_usuario.html');
  }

 ?>
