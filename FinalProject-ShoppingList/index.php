<?php  ///ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER 
        header("Content-Type: application/json; charset=UTF-8");
        require_once "models/database.php";
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $path = explode("/", trim($_SERVER["REQUEST_URI"], "/"));
        
        if ($path[0] === "items") {
            require "items.php";
        } else {
            echo json_encode(["error" => "Invalid endpoint"]);
        }
        
        
     ?>   
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "this is the start of the project";
        ?>
    </body>
</html>
