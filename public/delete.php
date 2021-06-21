<?php
    include("connection.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM producto WHERE idProducto = $id";
        $result = mysqli_query($con, $query);
        if(!$result){
            die('Query failed');
        }
        header("Location:admincatalogo.php");
    }
?>