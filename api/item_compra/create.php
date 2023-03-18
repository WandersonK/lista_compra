<?php

require_once "../credentials.php";

$conn = connect_bd();

if($_POST["NOME"] && $_POST["QUANTIDADE"] && $_POST["VALOR"] && $_POST["FK_ID_ITEM"] && $_POST["FK_ID_LISTA"]) {
  $result = pg_query($conn, "INSERT INTO LISTA_COMPRAS.ITEM_COMPRA 
    (
      NOME, 
      DATA_CRIACAO, 
      QUANTIDADE, 
      VALOR, 
      FK_ID_ITEM, 
      FK_ID_LISTA
    ) 
    VALUES 
    (
      '" . $_POST["NOME"] . "', 
      '" . dateTimeNow() . "', 
      '" . $_POST["QUANTIDADE"] . "', 
      '" . $_POST["VALOR"] . "', 
      '" . $_POST["FK_ID_ITEM"] . "', 
      '" . $_POST["FK_ID_LISTA"] . "'
    )
  ");

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