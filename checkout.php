<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'conecta.php';

$usuario = "'".$_SESSION["Usuario"]."'";


$sql = "SELECT * FROM clientes WHERE Email = ".$usuario;
$result3 = mysqli_query($conexao, $sql) or die ("erro ao executar sql: ".mysqli_error($conexao));
$usrObj = $result3->fetch_object();
$comprador = $usrObj->ID;
$data = date("Y-m-d h:i:sa");
$dataPedido = "'".(string)$data."'";


$totalCompra = 0;
$frete = 0;
$itens= '';
if(isset($_SESSION['basket'])) {
	foreach($_SESSION['basket'] as $ID => $quantidade) {
		$result = $mysqli->query("SELECT * FROM produtos WHERE id = ".$ID);
		$result2 = $mysqli->query("SELECT IDPedido FROM pedidos ORDER BY IDPedido DESC LIMIT 1");
		if($result){
			while($obj = $result->fetch_object()) {
				$valorItens =  $obj->preco * $quantidade;
				$frete = $frete + ($valorItens * .1);
				$totalCompra = $totalCompra + $valorItens;
			  
				$obj2 = $result2->fetch_object();
				$IDPed = $obj2->IDPedido;
				$IDPed = $IDPed + 1;
								
				$mysqli->query("INSERT INTO itemPedido (IDPedido, CodProd, QTD) VALUES ($IDPed,$obj->ID,$quantidade)");
         
			}
		}
	}
 	$totalCompra = $totalCompra + $frete;
 	$insertQuery = mysqli_query($conexao, "INSERT INTO pedidos (IDPedido, Endereco, Email, Frete, ValorPedido, Cliente, Data) VALUES('$IDPed', 'av.teste', 'teste@hotmail', $frete, $totalCompra, $comprador, $dataPedido)") or die ("erro ao executar sql: ".mysqli_error($conexao));

  if($insertQuery){
    unset($_SESSION['basket']);
    $_SESSION['pedido'] = $IDPed;
  }else{
  	header("location:basket.php");
  }
}
header("location:orderPlaced.php");
?>
