<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$ID = $_GET['ID'];
$acao = $_GET['action'];

if($acao === 'empty')
  unset($_SESSION['cart']);

$result = $mysqli->query("SELECT qty FROM products WHERE id = ".$ID);

if($result){
  if($obj = $result->fetch_object()) {

    switch($acao) {
      case "add":
      if($_SESSION['cart'][$ID]+1 <= $obj->qty)
        $_SESSION['cart'][$ID]++;
      break;

      case "remover":
      $_SESSION['cart'][$ID]--;
      if($_SESSION['cart'][$ID] == 0)
        unset($_SESSION['cart'][$ID]);
        break;
    }
  }
}
header("location:cart.php");
?>
