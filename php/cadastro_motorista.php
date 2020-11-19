<?php 
$nome 			 = $_POST['nome'];
$email 			 = $_POST['email'];
$senha  	 	 = $_POST['senha'];
$data_nasc 	     = $_POST['data_nasc'];
$cnh          	 = $_POST['cnh'];
$rg           	 = $_POST['rg'];
$cpf          	 = $_POST['cpf'];
$erro 			 = 0;

//Verifica se o campo nome não está em branco
if (empty($nome) OR strstr($nome, ' ')==false) {
	echo "Digite o seu nome corretamente<br>";
	$erro = 1;
}

//Verifica se o campo email está preenchido corretamente
if (strlen($email)< 8 || strstr($email, '@')==false) {
	echo "Digite o seu email corretamente<br>";
	$erro = 1;
}

//Verifica se o campo estado está preenchido com 2 digitos
if (strlen($senha)!=8) {
	echo "A senha deve ter pelo menos oito dígitos<br>";
	$erro = 1;
}

//Verifica se o campo comentarios está vazio
if (empty($data_nasc)) {
	echo "Digite a data de nascimento<br>";
	$erro = 1;
}

if (empty($data_nasc)) {
	echo "Digite a CNH<br>";
	$erro = 1;
}

if (empty($data_nasc)) {
	echo "Digite a RG<br>";
	$erro = 1;
}

if (empty($data_nasc)) {
	echo "Digite a CPF<br>";
	$erro = 1;
}

//Verifica se não houve erro - neste caso chama a include para inserir os dados
if ($erro == 0) {
	echo "Todos os dados foram digitados corretamente.<br>";
	include 'insere.inc';
}
?>