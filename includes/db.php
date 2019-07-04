<?php 
    define('SERVER','localhost');
    define('USER','project');
    define('PASSWORD','project');
    define('DB','cms');

    $conn = mysqli_connect(SERVER,USER,PASSWORD,DB);

    if($conn)
        //echo "connected successfully";

?>