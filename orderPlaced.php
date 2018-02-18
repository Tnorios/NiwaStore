<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <?php
       session_start();    
       include "conecta.php";
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
    <link rel="stylesheet" href="CSS&JS/orderPlaced.css" type="text/css">
    <title>Niwa</title>
    <style type="text/css"></style>
    <link rel="icon" href="logoM.png">
  </head>
  <body yahoo bgcolor="#e6e6e6">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFJDMR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <!--[if (gte mso 9)|(IE)]>
        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td>
      <![endif]-->
    <?php include "header.php";?>
    <table width="100%" bgcolor="#e6e6e6" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table class="content" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td class="header" bgcolor="#e6e6e6">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="innerpadding borderbottom">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
  <?php

      $pedido = $_SESSION['pedido'];
  		$result = $mysqli->query("SELECT * FROM pedidos WHERE IDPedido = ".$pedido);
  		if($result){
  			$obj = $result->fetch_object();
        
        $sql = 
        $result2 = $mysqli->query("SELECT * FROM clientes WHERE ID = ".$obj->Cliente);
        $cliente = $result2->fetch_object();
        
        echo   '<td class="h2">
                    Pedido Nº <a href="#">'.$obj->IDPedido.'</a> foi feito com sucesso!!
                  </td>
                </tr>
                <tr>
                  <td class="bodycopy">
                    Um pedido foi feito por '.$cliente->Nome.' '.$cliente->Sobrenome.'<br>(<a href="mailto:kenneth.paskett@hotwaxsysetms.com">'.$obj->Email.'</a>). Os detalhes do seu pedido podem ser encontrados abaixo.
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="innerpadding borderbottom bodycopy">
              <h3 class="">Detalhes do pedido - '.$obj->IDPedido.'</h3>
              <table class="table table-striped table-collapse" width="100%">
                <thead>
                  <th>Produto</th>
                  <th>Quantidade</th>
                  <th>Preço</th>
                  <th class="text-right">Subtotal</th>
                </thead>
                <tbody class="">'; 
  				

  			$resutItem = $mysqli->query("SELECT * FROM itemPedido WHERE IDPedido = ".$pedido);
        if($resutItem){
          while($objItem = $resutItem->fetch_object()){
            $IDProd = $objItem->CodProd;
            $itemData = $mysqli->query("SELECT * FROM produtos WHERE ID = ".$IDProd);
            if($itemData){
              $DataObj = $itemData->fetch_object();
              $total = $objItem->QTD * $DataObj->preco ;
              echo'<tr>
                   <td data-th="Product">'.$DataObj->titulo.'</td>
                   <td data-th="Quantity">'.$objItem->QTD.'</td>
                   <td data-th="Price">R$ '.$DataObj->preco.'</td>
                   <td data-th="Subtotal" class="text-right">R$ '.$total.'</td>
                   </tr>';
              $Subtotal = ($obj->ValorPedido - $obj->Frete); 
              echo '<script>
                    transactionProducts.push({
                        "ID": "'.$DataObj->ID.'",
                        "Quantidade": "'.$objItem->QTD.'",
                        "Imagem": "'.$DataObj->imagem.'",
                        "Titulo": "'.$DataObj->titulo.'",
                        "Descricao": "'.$DataObj->descricao.'",
                        "Preco" : "'.$DataObj->preco.'"
                      });
                    </script>';
            }else{echo "Erro ao buscar dados";}
          }

          echo '</tbody>
                  <tfoot class="text-right">
                    <td colspan="3">
                      <dl class="dl-horizontal pull-right">
                        <strong>Subtotal</strong><br>
                        <strong>Shipping</strong><br>
                        <strong>Total</strong>
                      </dl>
                    </td>
                    <td>
                      <dd class="text-right">R$ '.$Subtotal.'</dd>
                      <dd class="text-right">R$ '.round($obj->Frete,2).'</dd>
                      <dd class="text-right">R$ '.$obj->ValorPedido.'</dd>
                    </td>
                  </tfoot>';
          echo '<script>
                    dataLayer.push({transactionProducts},{
                      "Pedido" : "'.$pedido.'",
                      "Subtotal": "'.$Subtotal.'",
                      "Frete": "'.round($obj->Frete,2).'",
                      "Total": "'.$obj->ValorPedido.'"
                    });
                </script>';

          echo '              </table>
              </td>
            </tr>
            <tr>
              <td class="borderbottom">
                <table class="table">
                  <tr>
                    <td class="col-50 bodycopy" align="center">
                      <strong class="h5">Endereço de Entrega</strong><br>
                      <small> Nome: '.$cliente->Nome.' '.$cliente->Sobrenome.'<br>
                        <strong>'.$cliente->Endereco.'</strong><br>
                        CEP: '.$cliente->CEP.'<br>
                        Cidade: '.$cliente->Cidade.'</small>
                    </td>
                     <td class="col-50 bodycopy" align="center">
                      <strong class="h5">Endereço de cobrança</strong><br>
                      <small> Nome: '.$cliente->Nome.' '.$cliente->Sobrenome.'<br>
                        <strong>'.$cliente->Endereco.'</strong><br>
                        CEP: '.$cliente->CEP.'<br>
                        Cidade: '.$cliente->Cidade.'</small>
                    </td>
                  </tr>
                </table>

                    ';
        }else{echo "Erro ao buscar produtos";}
      }else{echo "Erro ao encontrar o pedido";}              
           
  ?> 
                <table align="center">
                  <tr >
                    <td width="95%" align="center" class="bodycopy bottompadding">
                      <strong class="h5">Metodo de pagamento</strong><br>
                      <small>A combinar... - Tá tudo certo por enquanto</small>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td class="footer" bgcolor="#262626">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" class="footercopy">
                      &reg; Awin<br/>
                      <a href="#" class="unsubscribe">
                        <font color="#ffffff">TSE</font>
                      </a> <span class="hide">Brasil.</span>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!--[if (gte mso 9)|(IE)]>
              </td>
          </tr>
      </table>
      <![endif]-->
  </body>
</html>