<?php

require_once "../credentials.php";

$conn = connect_bd();

$sql = "";

if($_POST["EXCLUIDO"]) {
  $sql = pg_query($conn, "SELECT * FROM LISTA_COMPRAS.LISTA WHERE EXCLUIDO = '". $_POST["EXCLUIDO"] ."'");
} else if($_POST["ID"]) {
  $sql = pg_query($conn, "SELECT * FROM LISTA_COMPRAS.LISTA WHERE ID_LISTA = '". $_POST['ID'] ."' AND EXCLUIDO = 0");
} else {
  $sql = pg_query($conn, "SELECT * FROM LISTA_COMPRAS.LISTA WHERE EXCLUIDO = 0");
}

$result = pg_fetch_all($sql);

if(!!$result) {
  $myJSON = retorno("0", $result);
  pg_close($conn);
  die($myJSON);
} else {
  $myJSON = retorno("-1");
  pg_close($conn);
  die($myJSON);
}

