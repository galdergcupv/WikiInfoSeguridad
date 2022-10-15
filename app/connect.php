<?php
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $DNI = $_POST['DNI'];
    $Telefono = $_POST['Telefono'];
    $Fecha = $_POST['Fecha'];
    $Email = $_POST['Email'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];

    //Database connection

    $conn = new mysqli('localhost','root','','wikiseguridad_db');
    
    if (mysqli_connect_error()){
        die('Connection Falied :'.mysqli_connect_error());
    }
    else{
        $stmt = $conn->prepare("insert into users(Nombre, Apellidos, DNI, Telefono, Fecha, Email, Usuario, Password) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissss", $Nombre, $Apellidos, $DNI, $Telefono, $Fecha, $Email, $Usuario, $Password);
        $stmt->execute();
        echo "Registro completado...";
        $stmt->close();
        $conn->close();
    }
   
?>