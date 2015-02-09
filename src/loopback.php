<?php 
    $method = $_SERVER["REQUEST_METHOD"];
    $args = ["GET" => $_GET, "POST" => $_POST];
    $array = ["Type" => $method, "parameters" => count($args[$method]) > 0 ? $args[$method] : null];
    echo json_encode($array);
?>