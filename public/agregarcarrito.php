<?php
    include("connection.php");
    if(isset($_GET['id']) && isset($_GET['us']) ){
        $id = $_GET['id'];
        $us = $_GET['us'];
        
        $query = "INSERT INTO carrito(articulo,usuario) VALUES ('$id', '$us')";
            $result = mysqli_query($con,$query); 
            header("Location:carrito.php");
    }
?>