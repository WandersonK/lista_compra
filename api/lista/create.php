<?php

require_once "../credentials.php";

$conn = connect_bd();

if($_POST["NOME"]) {
  $result = pg_query($conn, "INSERT INTO LISTA_COMPRAS.LISTA (NOME, DATA_CRIACAO) VALUES ('" . $_POST["NOME"] . "', '" . dateTimeNow() . "')");

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