<?php  ///ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER 
header('Content-Type: application/json');  
$request = $_SERVER['REQUEST_METHOD'];  
switch ($request) {  
case 'GET':  
require 'api/get.php';  
break;  
Case 'POST':  
require 'api/post.php';  
break;  
Case 'PUT':  
require 'api/put.php'; 
break;  
Case 'DELETE':  
require 'api/delete.php';  
break;  
default:  
http_response_code(405);  
echo json_encode(["status" => "error", "message" => "Invalid request method"]);  
}  
    ///ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER ROUTER 
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
