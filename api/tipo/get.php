<?php

require_once "../credentials.php";

$conn = connect_bd();

$sql = "";
if($_POST["ID"]) {
  $sql = pg_query($conn, "SELECT * FROM LISTA_COMPRAS.TIPO WHERE ID_TIPO = '". $_POST['ID'] ."'");
} else {
  $sql = pg_query($conn, "SELECT * FROM LISTA_COMPRAS.TIPO");
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

