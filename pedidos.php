<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <?php
       session_start();    
       include "conecta.php";
  ?>

  <head>
	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-WTFJDMR');
		</script>
	<!-- End Google Tag Manager -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="CSS&JS/Pedidos.css" type="text/css">
    <title>Niwa</title>
    <style type="text/css"></style>
    <link rel="icon" href="logoM.png">
  </head>

  <body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFJDMR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <?php include "header.php";?>
    <div class="container">
    <div class="row">
    <?php  
    if(isset($_SESSION['Usuario'])){
      $usuario = "'".$_SESSION["ID"]."'";   
      $result = $mysqli->query("SELECT * FROM pedidos WHERE cliente = ".$usuario. "ORDER BY IDPedido DESC"); 
      if($result){
        while($pedidos = $result->fetch_object()){
          $pedido = $pedidos-> IDPedido;
            echo '<div class="col-sm-6 col-sm-push-6content">
                      <div class="content">
                         <div class="click-target">
                            <table id="miyazaki">
                                <thead>
                                  <tr>
                                    <th>Pedido: '.$pedidos->IDPedido.'</th>                                  
                                    <th>Realizado: '.$pedidos->Data.'</th>
                                    <th>Valor Total: R$'.$pedidos->ValorPedido.'</th>
                                    <th>MAIS INFORMAÇÕES + </th>
                                  </tr>
                                </thead>                           
                            </table>
                          </div>
                      </div>
                      <div class="content" style="display: none;" >
                          <table id="miyazaki">
                            <tbody>';

          $resutItem = $mysqli->query("SELECT * FROM itemPedido WHERE IDPedido = ".$pedido);
          if($resutItem){
            while($objItem = $resutItem->fetch_object()){
            $IDProd = $objItem->CodProd;
            $itemData = $mysqli->query("SELECT * FROM produtos WHERE ID = ".$IDProd);
              if($itemData){
                $DataObj = $itemData->fetch_object();
                echo '<tr>
                           <td>'.$DataObj->titulo.'</td>
                           <td>Quantidade: '.$objItem->QTD.'</td>
                           <td>Valor Unitario: R$ '.$DataObj->preco.'</td>  
                      </tr>';
              }
            }
          }

        echo        '<tr>
                       <td class="last">Frete: R$'.round($pedidos->Frete, 2).'</td>
                       <td class="last">Valor Produtos: R$'.round(($pedidos->ValorPedido - $pedidos->Frete),2).'</td>
                       <td class="last">Valor Total: R$'.round($pedidos->ValorPedido,2).'</td>
                       
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>';
        }
      }
    }
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
      $(".click-target").click(function(){
        $(this).parent().next(".content").slideToggle("fast");

      });
    });
  </script>
      </div>
    </div>
  </body>
</html>
