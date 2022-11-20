<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Articulo</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="./index.html" id="navbar__logo">WikiInfoSeguridad</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="./visorArticulos.php" class="navbar__links">Artículos</a>
                </li>
                <li class="navbar__item">
                    <a href="./crearArticulo.html" class="navbar__links">Nuevo</a>
                </li>
                <li class="navbar__btn">
                    <a href="./login.html" class="button">Iniciar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Section -->
    <h2>Sesión iniciada correctamente...</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Fecha de nacimiento</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $Usuario = $_GET["Usuario"];
            // Create connection
            $connection = new mysqli('db','admin','7iXXAwY2RgIaS!2C','database');

            // Check connection
            if ($connection->connect_error){
                die("Connection failed: " .$connection->connect_error);
            }

            // Read all row from database table
            $stmt = $connection->prepare("select * from users where Usuario = ?");
            $stmt->bind_param("s", $Usuario);
            $stmt->execute();
        
            $stmt_result = $stmt->get_result();

            if (!$stmt_result){
                die("Invalid query: " .$connection->error);
            }
            
            // Read data of each row
            $row = $stmt_result->fetch_assoc();
                echo "<tr>
                <td>" . $row["Nombre"] . "</td>
                <td>" . $row["Apellidos"] . "</td>
                <td>" . $row["DNI"] . "</td>
                <td>" . $row["Fecha"] . "</td>
                <td>" . $row["Telefono"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Usuario"] . "</td>
            </tr>";
            ?>
        </tbody>
        
    </table>

    <!-- Footer Section -->
    <div class="footer__container">
        <div class="footer__links">
            <div class="footer__link--wrapper">
                <div class="footer__link--items">
                    <h2>Sobre nosotros</h2>
                    <a href="./index.html">Cómo funciona</a>
                    <a href="./index.html">Testimonios</a>
                    <a href="./index.html">Carreras</a>
                    <a href="./index.html">Inversiones</a>
                    <a href="./index.html">Términos y condiciones</a>
                </div>
                <div class="footer__link--items">
                    <h2>Contáctanos</h2>
                    <a href="./index.html">Contacto</a>
                    <a href="./index.html">Soporte</a>
                    <a href="./index.html">Destinos</a>
                    <a href="./index.html">Patrocinios</a>
                </div>
            </div>
            <div class="footer__link--wrapper">
                <div class="footer__link--items">
                    <h2>Vídeos</h2>
                    <a href="./index.html">Enviar vídeo</a>
                    <a href="./index.html">Embajadores</a>
                    <a href="./index.html">Agencia</a>
                    <a href="./index.html">Influencer</a>
                </div>
                <div class="footer__link--items">
                    <h2>Redes sociales</h2>
                    <a href="./index.html">Instagram</a>
                    <a href="./index.html">Facebook</a>
                    <a href="./index.html">YouTube</a>
                    <a href="./index.html">Twitter</a>
                </div>
            </div>
        </div>
        <div class="social__media">
            <div class="social__media--wrap">
                <div class="footer__logo">
                    <a href="./index.html" id="footer__logo"><i class="fas faa-gem"></i>WikiInfoSeguridad</a>
                </div>
                <p class="website__rights">© WikiInfoSeguridad 2022. All rights reserved</p>
                <!-- <div class="social__icons">
                    <a href="/" class="social__icon--link" target="_blank">
                        <i class="fab fa-facebook">fb</i>
                    </a>
                    <a href="/" class="social__icon--link" target="_blank">
                        <i class="fab fa-instagram">ig</i>
                    </a>
                    <a href="/" class="social__icon--link" target="_blank">
                        <i class="fab fa-twitter">tw</i>
                    </a>
                    <a href="/" class="social__icon--link" target="_blank">
                        <i class="fab fa-youtube">yt</i>
                    </a>
                </div> -->
            </div>
        </div>
    </div>

    <script src='./app.js'></script>
</body>
</html>