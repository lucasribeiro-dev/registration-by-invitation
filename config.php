<?php
  //Dados da DB
  $dsn = "mysql:dbname=registro_de_convite;host=localhost";
  $dbuser = "root";
  $dbpass = "";

  try{
    //Conectando com a db e comparando login e senha 
      $pdo = new PDO($dsn, $dbuser, $dbpass);

  }catch(PDOExcepetion $e){
    echo "Falhou: ".$e->getMessage();
  }
?>