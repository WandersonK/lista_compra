<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

ini_set('max_execution_time', 0);
ini_set("allow_url_fopen", 1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(E_ERROR);


function connect_bd() {
  $servername = "host=localhost ";
  $username = "user=postgres ";
  $password = "password=postgres ";
  $dbname = "dbname=compras_db ";
  $port = "port=5432";
  
  date_default_timezone_set("America/Sao_Paulo");
  
  $bdcon = $servername . $username . $password . $dbname . $port;
  
  $conn = pg_connect($bdcon);
  return $conn;
}

function dateTimeNow()
{
	$datetime = new DateTime('now', new DateTimeZone("America/Sao_Paulo"));
	return $datetime->format("Y-m-d H:i:s");
}

function http_response_message($code = NULL)
{
  if ($code !== NULL) {
    switch ($code) {
      case 100:
        $text = 'Continue';
        break;
      case 101:
        $text = 'Switching Protocols';
        break;
      case 200:
        $text = 'OK';
        break;
      case 201:
        $text = 'Created';
        break;
      case 202:
        $text = 'Accepted';
        break;
      case 203:
        $text = 'Non-Authoritative Information';
        break;
      case 204:
        $text = 'No Content';
        break;
      case 205:
        $text = 'Reset Content';
        break;
      case 206:
        $text = 'Partial Content';
        break;
      case 300:
        $text = 'Multiple Choices';
        break;
      case 301:
        $text = 'Moved Permanently';
        break;
      case 302:
        $text = 'Moved Temporarily';
        break;
      case 303:
        $text = 'See Other';
        break;
      case 304:
        $text = 'Not Modified';
        break;
      case 305:
        $text = 'Use Proxy';
        break;
      case 400:
        $text = 'Bad Request';
        break;
      case 401:
        $text = 'Unauthorized';
        break;
      case 402:
        $text = 'Payment Required';
        break;
      case 403:
        $text = 'Forbidden';
        break;
      case 404:
        $text = 'Not Found';
        break;
      case 405:
        $text = 'Method Not Allowed';
        break;
      case 406:
        $text = 'Not Acceptable';
        break;
      case 407:
        $text = 'Proxy Authentication Required';
        break;
      case 408:
        $text = 'Request Time-out';
        break;
      case 409:
        $text = 'Conflict';
        break;
      case 410:
        $text = 'Gone';
        break;
      case 411:
        $text = 'Length Required';
        break;
      case 412:
        $text = 'Precondition Failed';
        break;
      case 413:
        $text = 'Request Entity Too Large';
        break;
      case 414:
        $text = 'Request-URI Too Large';
        break;
      case 415:
        $text = 'Unsupported Media Type';
        break;
      case 500:
        $text = 'Internal Server Error';
        break;
      case 501:
        $text = 'Not Implemented';
        break;
      case 502:
        $text = 'Bad Gateway';
        break;
      case 503:
        $text = 'Service Unavailable';
        break;
      case 504:
        $text = 'Gateway Time-out';
        break;
      case 505:
        $text = 'HTTP Version not supported';
        break;
      default:
        exit('Unknown http status code "' . htmlentities($code) . '"');
        break;
    }
    http_response_code($code);
    return $text;
  }
}

function response_sql($code) {
  $msg = [
    "0" => "success",
    "-1" => "fail"
  ];

  return $msg[$code];
}

function retorno($code, $json = null) {
  $myObj = new stdClass();
    $myObj->cod = $code;
    $myObj->message = response_sql($code);
    if($json) {
      $myObj->return = $json;
    }
    return json_encode($myObj);
}
