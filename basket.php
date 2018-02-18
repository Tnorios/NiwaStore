<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   
  <?php
    //if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(session_id() == '' || !isset($_SESSION)){session_start();}
    include 'conecta.php';
  ?>

  <head>
	<!-- Google Tag Manager -->
    <script>
      dataLayer = [];
      transactionProducts = [];
    </script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-WTFJDMR');
		</script>
	<!-- End Google Tag Manager -->	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Niwa</title>
    <style type="text/css"></style>
    <link rel="stylesheet" href="CSS&JS/foundation.css" type="text/css">
    <link rel="icon" href="logoM.png">
  </head>

  <body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFJDMR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <?php include "header.php";?>
    <table>
      <tr>
        <th>Nome</th>
        <th>quantidade</th>
        <th>Valor unitario</th>
        <th>Preço</th>
      </tr>
      <p><h1>Carrinho</h1></p>
  
  <!-- Itens Carrinho -->

  <?php
    $totalCompra = 0;
    $frete = 0;
    if(isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
      foreach($_SESSION['basket'] as $ID => $quantidade) {
        $result = $mysqli->query("SELECT * FROM produtos WHERE id = ".$ID);
        if($result){
        while($obj = $result->fetch_object()) {
            $valorItens =  $obj->preco * $quantidade;
            $frete = $frete + ($valorItens * .1);
            $totalCompra = $totalCompra + $valorItens;

            echo '<tr>
                    <td>'.$obj->titulo.'</td>
                    <td>'.$quantidade.' 
                      <a class="button" style="padding:5px;" href="/Produtos/update.php?action=add&id='.$ID.'">+</a>
                      <a class="button alert" style="padding:5px;" href="/Produtos/update.php?action=remover&id='.$ID.'">-</a>
				              <a class="button" style="padding:5px;" href="/Produtos/update.php?action=zerar&id='.$ID.'">Remover</a>
                    <td>R$ '.$obj->preco.'</td>
                    <td>R$ '.$valorItens.'</td>
                  </tr>';

            echo '<script>
                    transactionProducts.push({
                        "ID": "'.$obj->ID.'",
                        "Quantidade": "'.$quantidade.'",
                        "Imagem": "'.$obj->imagem.'",
                        "Titulo": "'.$obj->titulo.'",
                        "Descricao": "'.$obj->descricao.'",
                        "Preco" : "'.$obj->preco.'"
                      });
                  </script>';
           
            }
            
          }
        }
         echo '<tr>
                    <td colspan="2"></td>
                    <td style="font-weight: bold;" >Frete</td>
                    <td style="font-weight: bold;" >R$ '.round($frete,2).'</td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td style="font-weight: bold;" >Total</td>
                    <td style="font-weight: bold;">R$ '.$totalCompra.'</td>
                  </tr>';
        $totalCompra = $totalCompra + $frete; 
        echo '<tr class="checkoutrow">
                <td colspan="2" ><a href="index.php" class="button [secondary success alert]">Continue comprando</a></td>';
        if(isset($_SESSION['Usuario'])){
          echo '<td colspan="2" class="checkout"><a href="checkout.php"><button style="float:right;">Checkout</button></a></td>';
        }
        else {
          echo '<td colspan="2" class="checkout"><a href="login.php"><button style="float:right;">Login</button></a></td>';
        }
      }else {

        echo '<td colspan="4"><h1>Seu carrinho está vazio :(</h1></td>
                <tr class="checkoutrow">
                <td style="visibility: hidden" colspan="2" ><a href="index.php" class="button [secondary success alert]">Continue comprando</a></td>
                <td colspan="2" class="checkout"><a href="index.php"><button style="float:right;">Voltar as compras</button></a></td>  
  	          </tr>';
      }
      echo '<script>
                    dataLayer.push({transactionProducts});
            </script>';

    ?>  
    </table>
  </body>
</html>