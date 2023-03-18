<?php

require_once "../credentials.php";

$conn = connect_bd();

if($_POST["NOME"] && $_POST["MEDIDA"] && $_POST["FK_ID_TIPO"]) {
  $result = pg_query($conn, "INSERT INTO LISTA_COMPRAS.ITEM (NOME, MEDIDA, FK_ID_TIPO) VALUES ('" . $_POST["NOME"] . "', '" . $_POST["MEDIDA"] .  "', '" . $_POST["FK_ID_POST"] . ")");
  // $result = pg_query($conn, "SELECT * FROM LISTA_COMPRAS.TIPO");
  // $result = pg_fetch_all($result);

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

