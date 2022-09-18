<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "curd";
    // create Connection 
    $connection = new mysqli($servername, $username, $password, $database);
    $sql = "DELETE FROM clients WHERE id=$id";
    $connection->query($sql);
}
header("location: /clients/index.php");
exit;
?>