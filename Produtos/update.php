<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include "../conecta.php";

$ID = $_GET['id'];
$acao = $_GET['action'];


if($acao === 'empty') unset($_SESSION['basket']);


$sql = "SELECT * FROM produtos WHERE ID = ".$ID;
$result = mysqli_query($conexao, $sql) or die ("erro ao executar sql: ".mysqli_error($conexao));

if($result){
  if($obj = $result->fetch_object()) {

    switch($acao) {

      case "add":
        $_SESSION['basket'][$ID]++;
        echo '<script>console.log("teste")</script>';
        echo $_SESSION['basket'][$ID];
      
      break;

      case "remover":
      $_SESSION['basket'][$ID]--;
      if($_SESSION['basket'][$ID] == 0)      
        unset($_SESSION['basket'][$ID]);
        break;
		
	 case "zerar":
		unset($_SESSION['basket'][$ID]);
        break;



    }
  }
}



header("location:../basket.php");

?>
