<?php

require_once "../credentials.php";

$conn = connect_bd();

$method = $_SERVER['REQUEST_METHOD'];
if ('DELETE' === $method) {
  parse_str(file_get_contents('php://input'), $_DELETE);
}
// Function Edit Data

echo '<pre>';
print_r($_DELETE["ID"]);
echo '</pre>';

if($_DELETE["ID"]) {
  $result = pg_query($conn, "UPDATE LISTA_COMPRAS.TIPO SET EXCLUIDO = 1 WHERE ID_TIPO = '". $_DELETE["ID"] ."'");

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

