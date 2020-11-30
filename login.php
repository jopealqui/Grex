<?php
/*  $servername = "localhost:3306";
  $username   = "root";
  $password   = "";
  $database   = "db_sc";

  $conexao = mysqli_connect($servername, $username, $password, $database);

  $email = $_POST['email'];

  $consultaU     = "SELECT CAST(AES_DECRYPT(senha,'key') as char) FROM usuario WHERE email = '$email'";
  $consultaM     = "SELECT CAST(AES_DECRYPT(senha,'key') as char) FROM motorista WHERE email = '$email'";
  $senhaU        = mysqli_query($conexao, $consultaU);
  $senhaM        = mysqli_query($conexao, $consultaM);
/*$fetch_arrayU = mysqli_fetch_array($hashU);
  $rowU         = implode ($fetch_arrayU);
  $fetch_arrayM = mysqli_fetch_array($hashM);
  $rowM         = implode ($fetch_arrayM);
*/

  $host     = 'localhost:3306';
  $user     = 'root';
  $passwd   = '';
  $database = "db_sc";

  $pdo = NULL;

  $dsn = 'mysql:host=' . $host . ';dbname=' . $database;

  try
  {
     $pdo = new PDO($dsn, $user,  $passwd);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e)
  {
     echo 'Database connection failed.';
     die();
  }

  $login = FALSE;

  $username = $_POST['email'];
  $password = $_POST['senha'];

  $queryM = "SELECT senha FROM motorista WHERE email = '$username'";
  $queryU = "SELECT senha FROM usuario WHERE email = '$username'";

  $values = ['email' => $username];

  try
  {
    $resU = $pdo->prepare($queryU);
    $resU->execute($values);
    $resM = $pdo->prepare($queryM);
    $resM->execute($values);
  }
  catch (PDOException $e)
  {
    echo 'Query error.';
    die();
  }

  $rowU = $resU->fetch(PDO::FETCH_ASSOC);
  $rowM = $resM->fetch(PDO::FETCH_ASSOC);

  if (is_array($rowU) or is_array($rowM))
  {
    if (password_verify($password, $rowU['senha']))
    {
      header('Location: pagina_motorista.html');
    }
    elseif (password_verify($password, $rowM['senha']))
    {
      header('Location: pagina_usuario.html');
    }
    else
    {
      header('Location: login.html');
    }
  }
?>
