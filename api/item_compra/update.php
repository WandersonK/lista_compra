<?php

require_once "../credentials.php";

$conn = connect_bd();

$sql = "";
if($_POST["ID"]) {
  $sql_param = "";

  if($_POST["NOME"]) {
    $sql_param = " NOME = '". $_POST['NOME'] ."' ";
    if($_POST["QUANTIDADE"] || $_POST["VALOR"]) $sql_param = ",";
  }
  if($_POST["QUANTIDADE"]) {
    $sql_param = " QUANTIDADE = '". $_POST['QUANTIDADE'] ."' ";
    if($_POST["VALOR"]) $sql_param = ",";
  }
  if($_POST["VALOR"]) {
    $sql_param = " VALOR = '". $_POST['QUANTIDADE'] ."' ";
  }

  $sql = "UPDATE LISTA_COMPRAS.ITEM_COMPRA SET " . $sql_param . " WHERE ID_ITEM_COMPRA = '". $_POST['ID'] ."'";
}

$result = pg_query($conn, $sql);

if(!!$result) {
  $myJSON = retorno("0");
  pg_close($conn);
  die($myJSON);
} else {
  $myJSON = retorno("-1");
  pg_close($conn);
  die($myJSON);
}
