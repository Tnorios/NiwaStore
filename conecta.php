<?php

//fazer conexao
$mysqli = new mysqli("sql306.epizy.com","epiz_21329605","wtys5ub1QZ7I","epiz_21329605_niwa");
$conexao = mysqli_connect("sql306.epizy.com","epiz_21329605","wtys5ub1QZ7I","epiz_21329605_niwa");

//Fazer conexao local
//$mysqli = new mysqli("localhost:3306","root","","Awin");
//$conexao = mysqli_connect("localhost:3306","root","","Awin");

//caso de erros
if (mysqli_connect_errno())
    {
        echo "não foi possivel conectar: ".mysqli_connect_error();
    }
?>
