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
    <title>Niwa</title>
    <style type="text/css"></style>
    <link rel="stylesheet" href="CSS&JS/foundation.css" />
    <script src="CSS&JS/modernizr.js"></script>
  </head>
	<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTFJDMR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->	
    <?php include "header.php";?>
    <form method="POST" action="inserirUsuario.php" style="margin-top:30px;">
    <div class="row">
      <h1>Cadastre-se</h1>
      <div class="small-8">
        <div class="row">    
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Nome</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="Nico" name="Nome">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Sobrenome</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="Bellic" name="Sobrenome">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Endereço</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="550 9th Ave" name="Endereco">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Cidade</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="NY" name="Cidade">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">CEP</label>
          </div>
          <div class="small-8 columns">
            <input type="text" id="right-label" placeholder="01311-000" name="CEP">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">E-Mail</label>
          </div>
          <div class="small-8 columns">
            <input type="email" id="right-label" placeholder="NicoBellic@eyefind.com" name="Email">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
            <label for="right-label" class="right inline">Senha</label>
          </div>
          <div class="small-8 columns">
            <input type="password" id="right-label" name="Senha">
          </div>
        </div>
        <div class="row">
          <div class="small-4 columns">
          </div>
          <div class="small-8 columns">
            <input type="submit" id="right-label" value="Registrar" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>