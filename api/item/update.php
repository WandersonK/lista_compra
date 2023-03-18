<?php

require_once "../credentials.php";

$conn = connect_bd();

$sql = "";
if($_POST["ID"] && $_POST["NOME"]) {
  $sql = "UPDATE LISTA_COMPRAS.ITEM SET NOME = '". $_POST['NOME'] ."' WHERE ID_TIPO = ". $_POST['ID'];
} else if($_POST["ID"] && $_POST["EXCLUIDO"] == 0) {
  $sql = "UPDATE LISTA_COMPRAS.ITEM SET EXCLUIDO = ". $_POST['EXCLUIDO'] ." WHERE ID_TIPO = ". $_POST['ID'];
} else if($_POST["ID"] && $_POST["MEDIDA"]) {
  $sql = "UPDATE LISTA_COMRPAS.ITEM SET MEDIDA = '". $_POST['MEDIDA'] ."' WHERE ID_ITEM = ". $_POST['ID'];
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
