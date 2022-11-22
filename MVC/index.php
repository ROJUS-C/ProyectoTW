<?php
define('__ROOT__', dirname(dirname(__FILE__)));


trim("$_SERVER[REQUEST_URI]");
require_once './app/app.php';

$app = new App();

?>