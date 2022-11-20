<?php
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];

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
                header('Location: ./cuenta.php?Usuario='.$Usuario);
            }
            else{
                echo "<script>
                alert('Contraseña no váilda');
                window.location.href='./login.html';
                </script>";
            }    
        }
        else{
            echo "<script>
                alert('Usuario no váildo');
                window.location.href='./login.html';
                </script>";
        }


        $stmt->close();
        $conn->close();
    }
?>