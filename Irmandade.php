<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <?php
    session_start();    
    include "conecta.php";
  ?>
  <head>  
  <!-- Google Tag Manager -->
    <script>
      dataLayer = [{
        'pageCategory': 'Irmandade',
      }];  
    </script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-WTFJDMR');
		</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Niwa</title>
    <style type="text/css"></style>
    <link rel="stylesheet" href="CSS&JS/Index.css" type="text/css">
    <link rel="icon" href="logoM.png">
  </head>
  <body>      
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFJDMR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <?php include "header.php";?>
    <div class="product_grid">
      <ul class="product_list list">
        <?php 	
        $sql = "SELECT * FROM produtos WHERE Categoria = 'Irmandade'";

        $result = mysqli_query($conexao, $sql) or die ("erro ao executar sql: ".mysqli_error($conexao));

        if($result === FALSE){
            die(mysql_error());
        }
        if($result){
          while($obj = $result->fetch_object()) {
            echo '<li class="product_item">
              <div class="product_image">
                <a href="Produtos/'.$obj->URL.'.php"><img src="'.$obj->imagem.'" alt=""></a>    
                  <div class="product_buttons"> 
                    <div class="quick_view">
                      <a href="Produtos/update.php?action=add&id='.$obj->ID.'"><h6>COLOCAR NO CARRINHO</h6></a>
                    </div>
                  </div>
              </div>
              <div class="product_values">
                <div class="product_title">
                  <h5>'.$obj->titulo.'</h5>
                </div>
                <div class="product_price">
                  <a href="product.php"><span class="price_new">$'.$obj->preco.'</span></a>
                </div>
                <div class="product_desc">
                  <p class="truncate">'.$obj->descricao.'</p>
                </div>
              </div>
            </li>';
          }
        }
        ?>
      </ul>
    </div>
    <footer class="footer">
      <td align="center">
        &reg; Awin<br/>
        <span class="unsubscribe">
            <font color="#ffffff">TSE</font>
        </span> <span class="hide">Brasil.</span>
      </td>
    </footer>
  </body>
</html>