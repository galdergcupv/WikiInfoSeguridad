<?php
    $Titulo = $_POST['Titulo'];
    $Texto = $_POST['Texto'];
    $Fuentes = $_POST['Fuentes'];
    $Autor = $_POST['Autor'];
    $ID = $_POST['ID'];

    //Database connection

    $conn = new mysqli('db','admin','test','database');
    
    if (mysqli_connect_error()){
        die('Connection Falied :'.mysqli_connect_error());
    }
    else{
        $stmt = $conn->prepare("insert into articulos(ID, Titulo, Texto, Fuentes, Autor) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $ID, $Titulo, $Texto, $Fuentes, $Autor);
        $stmt->execute();
        header('Location: ./visorArticulos.php');
        $stmt->close();
        $conn->close();
    }
   
?>