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

    $conn = new mysqli('db','admin','7iXXAwY2RgIaS!2C','database');
    
    if (mysqli_connect_error()){
        die('Connection Falied :'.mysqli_connect_error());
    }
    else{
        $stmt = $conn->prepare("insert into users(Nombre, Apellidos, DNI, Telefono, Fecha, Email, Usuario, Password) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissss", $Nombre, $Apellidos, $DNI, $Telefono, $Fecha, $Email, $Usuario, $Password);
        $stmt->execute();
        echo "<script>
        alert('Registro completado...');
        window.location.href='./index.html';
        </script>";
        $stmt->close();
        $conn->close();
    }
   
?>