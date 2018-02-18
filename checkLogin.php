<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'conecta.php';

$Usuario = $_POST["Usuario"];
$Usuario = strtolower($Usuario);
$Senha = $_POST["Senha"];
$flag = 'true';

$result = $mysqli->query('SELECT * from clientes order by id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->Email === $Usuario && $obj->Senha === $Senha) {
      $_SESSION['Usuario'] = $Usuario;
      $_SESSION['ID'] = $obj->ID;
      $_SESSION['Nome'] = $obj->Nome;
      header("location:index.php");
    } 
    else {
      if($flag === 'true'){
        redirect();
        $flag = 'false';
      }
    }
  }
}

function redirect() {
  echo '<h1>Login Invalido! Redirecionando...</h1>';
  header("Refresh: 2; url=index.php");
}

?>
