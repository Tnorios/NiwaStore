<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <?php
    session_start();    
    include "../conecta.php";
  ?>

  <head>
  <!-- Google Tag Manager -->
    <script>
      dataLayer = [];
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
    <link rel="stylesheet" href="product.css" type="text/css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,800" type="text/css">
    <link rel="icon" href="logoM.png">
  </head>
  <body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFJDMR"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->  
    <?php include "header.php";?>
    <div class="container">
    <div class="product-container main-product-container">

    <?php   
      $sql = "SELECT * FROM produtos WHERE ID=9";
      $result = mysqli_query($conexao, $sql) or die ("erro ao executar sql: ".mysqli_error($conexao));
      $obj = $result->fetch_object();

      echo  ' <div class="product-left-container">
                <img src="'.$obj->imagem.'" alt="" width="540"/> 
              </div>
              <div class="product-col-container">
                <h1 class="product-page">'.$obj->titulo.'</h1>
                  <p>
                  <b>Descrição</b><br/>
                  '.$obj->descricao.'
                  </p>
                  <p class="product-price">
                  <b>Preço:</b> 
                  <span class="price">R$: '.$obj->preco.'</span>';
      echo '<script>
              dataLayer.push({
                "ID": "'.$obj->ID.'",
                "Imagem": "'.$obj->imagem.'",
                "Titulo": "'.$obj->titulo.'",
                "Descricao": "'.$obj->descricao.'",
                "Preco" : "'.$obj->preco.'"
              });
            </script>'
      ?>

            <span class="product-price-meta" style="float:right;">
              Frete grátis para mansão X
            </span>
            </p>
            <p>
            <?php echo '<a href="update.php?action=add&id='.$obj->ID.'"><button>Comprar</button>';
            ?>
            <br clear="both"/>
          </p>
        </div>
  </body>
</html>