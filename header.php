<link rel="stylesheet" href="CSS&JS/header.css" type="text/css">

<!-- FONT API-->
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>

<!-- ICON API-->
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">


<div class='menuwrap'>

  <nav id='menu'>
  <input type='checkbox'/>
  
    <label >
      <i class="fa fa-bars"></i>
      <!--&#8801-->
      <span><a href='/'><img width="50px" height="100%" src="logoM.png"></a></span>
    </label>
    <ul>
      <li><a href='/'><img class="logo" src="logoM.png"></a></li>
      <!-- <li><a href='/'>Home</a></li> -->
      <li><a href='/'>Produtos<font size='1'>&#9660;</font></a>
        <ul class='menus'>
          <li><a href='X-men.php'>X-men</a></li>
          <li><a href='Irmandade.php'>Irmandade</a></li>
        </ul>
      </li>
      <li><a href="basket.php">Carrinho</a></li>
      
      
      <!-- <li><a href='#'>Drop Down <font size='1'>&#9660;</font></a>
        <ul class='menus'>
          <li><a href='#'>Tab 1</a></li>
          <li><a href='#'>Tab 2</a></li>
          <li><a href='#'>Tab 3</a></li>
        </ul>
      </li> -->
      <?php
          if(isset($_SESSION['Usuario'])){
            echo '<li><a href="pedidos.php">Meus Pedidos</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
            
          }
          else{
            echo '<li><a href="cadastro.php">cadastre-se</a></li>';
            echo '<li><a href="login.php">Log In</a></li>';
          }
          ?>
      <!-- <li><a href='#'>Advertise</a></li> -->

    </ul>
  </nav>
</div>
