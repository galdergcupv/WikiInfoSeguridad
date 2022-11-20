<?php

    session_start();

    $Usuario = $_POST["Usuario"];
    $Password = $_POST["Password"];

    if (isset($_SESSION["Bloqueado"])){
        $Diferencia = time() - $_SESSION["Bloqueado"];
        if ($Diferencia > 30) {
            unset($_SESSION["Bloqueado"]);
            unset($_SESSION["Intentos"]);
        }
        else {
            echo "<script>
                alert('Demasiados intentos fallidos, espere 30 segundos antes de continuar');
                window.location.href='./login.html';
                </script>";
        }
    }

    function crearLog($fUsuario){
        $fileLocation = "/tmp/log.txt";
        $file = fopen($fileLocation,"a");
        $content = "Inicio de sesión no válido: " . $fUsuario . " ". date('d/m/Y h:i:s') . "\n";
        fwrite($file,$content);
        fclose($file);
    }

    //Database connection

    $conn = new mysqli('db','admin','7iXXAwY2RgIaS!2C','database');
    
    if (mysqli_connect_error()){
        die('Connection Falied :'.mysqli_connect_error());
    }
    else{
        $stmt = $conn->prepare("select * from users where Usuario = ?");
        $stmt->bind_param("s", $Usuario);
        $stmt->execute();
        
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if(password_verify($Password, $data['Password'])){
                unset($_SESSION["Intentos"]);
                header('Location: ./cuenta.php?Usuario='.$Usuario);
            }
            else{
                if ($_SESSION["Intentos"] > 2) {
                    $_SESSION["Bloqueado"] = time();
                    echo "<script>
                alert('Demasiados intentos fallidos, espere 30 segundos antes de continuar');
                window.location.href='./login.html';
                </script>";
                }
                crearLog($Usuario);
                $_SESSION["Intentos"] += 1;
                echo "<script>
                alert('Contraseña no váilda');
                window.location.href='./login.html';
                </script>";
            }    
        }
        else{
            if ($_SESSION["Intentos"] > 2) {
                $_SESSION["Bloqueado"] = time();
                echo "<script>
            alert('Demasiados intentos fallidos, espere 30 segundos antes de continuar');
            window.location.href='./login.html';
            </script>";
            }
            crearLog($Usuario);
            $_SESSION["Intentos"] += 1;
            echo "<script>
                alert('Usuario no váildo');
                window.location.href='./login.html';
                </script>";
        }


        $stmt->close();
        $conn->close();
    }
?>