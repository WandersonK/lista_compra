<?php

require_once "../credentials.php";

$conn = connect_bd();

if($_POST["ID"]) {
  $result = pg_query($conn, "UPDATE LISTA_COMPRAS.LISTA SET EXCLUIDO = 1 WHERE ID_LISTA = '". $_POST['ID'] ."'");

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

