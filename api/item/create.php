<?php

require_once "../credentials.php";

$conn = connect_bd();

$name = $_POST["NOME"];
$medi = $_POST["MEDIDA"];
$fk = $_POST["FK_ID_TIPO"];

if($_POST["NOME"] || $_POST["MEDIDA"] || $_POST["FK_ID_TIPO"]) {
  $result = pg_query($conn, "INSERT INTO LISTA_COMPRAS.ITEM 
    (
      NOME, 
      MEDIDA, 
      FK_ID_TIPO
    )
    VALUES
    (
      '". $_POST["NOME"] ."',
      '". $_POST["MEDIDA"] ."',
      '". $_POST["FK_ID_TIPO"] ."'
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

