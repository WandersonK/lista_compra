<?php

require_once "../credentials.php";

$conn = connect_bd();

if($_POST["NOME"]) {
  $result = pg_query($conn, "INSERT INTO LISTA_COMPRAS.TIPO (NOME) VALUES ('" . $_POST["NOME"] . "')");

  if(!!$result) {
    $myJSON = retorno("0");
    pg_close($conn);
    die($myJSON);
  } else {
    $myJSON = retorno("-1");
    pg_close($conn);
    die($myJSON);
  }
}

