<?php

//fazer conexao
$mysqli = new mysqli("mysql.hostinger.com.br","u663710773_root","root12","u663710773_adm");
$conexao = mysqli_connect("mysql.hostinger.com.br","u663710773_root","root12","u663710773_adm");

//Fazer conexao local
//$mysqli = new mysqli("localhost:3306","root","","adm");
//$conexao = mysqli_connect("localhost:3306","root","","adm");

//caso de erros
if (mysqli_connect_errno())
    {
        echo "não foi possivel conectar: ".mysqli_connect_error();
    }
?>