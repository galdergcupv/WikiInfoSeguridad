
<?php
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];

    //Database connection

    $conn = new mysqli('localhost','root','','wikiseguridad_db');
    
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
            if($data['Password'] === $Password){
                header('Location: ./cuenta.php ?Usuario='.$Usuario);
            }
            else{
                echo "<h2> Contraseña no válida </h2>";
            }    
        }
        else{
            echo "<h2> Usuario no válido </h2>";
        }


        $stmt->close();
        $conn->close();
    }
?>