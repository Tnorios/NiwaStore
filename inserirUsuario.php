<?php

include 'conecta.php';

 $Nome = $_POST["Nome"];
 $Sobrenome = $_POST["Sobrenome"];
 $Endereco = $_POST["Endereco"];
 $Cidade = $_POST["Cidade"];
 $CEP = $_POST["CEP"];
 $Email = $_POST["Email"];
 $Email = strtolower($Email);
 $Senha = $_POST["Senha"];

if($mysqli->query("INSERT INTO clientes (Nome, Sobrenome, Endereco, Cidade, CEP, Email, Senha) VALUES('$Nome', '$Sobrenome', '$Endereco', '$Cidade', $CEP, '$Email', '$Senha')")){
	echo 'Data inserted';
	echo '<br/>';

	
	echo '<form method="POST" action="checkLogin.php" id="loginForm">
	<input type="email" id="right-label" value='.$Email.'
	name="Usuario">
	<input type="password" id="right-label" name="Senha" value='.$Senha.'>
	</form>
	<script type="text/javascript">
	document.getElementById("loginForm").submit();
	</script>';

}else{
	echo '<h1>Erro ao fazer Cadastro! Por favor tente novamente...</h1>';
	header("Refresh: 2; url=cadastro.php");
}
?>
