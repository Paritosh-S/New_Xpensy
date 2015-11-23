<?php
try {
 $conn = new PDO("mysql:host='mysql13.000webhost.com'; dbname='a7853310_test','a7853310_root','raj123456'"); 
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo " connected ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd ";
    }
 catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>