-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2022 a las 17:10:28
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wikiseguridad_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `ID` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Texto` text NOT NULL,
  `Fuentes` varchar(100) NOT NULL,
  `Autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`ID`, `Titulo`, `Texto`, `Fuentes`, `Autor`) VALUES
(1, 'Algoritmos resumen', 'Generan un criptograma que representa el contenido original: De tamaño constante, independientemente del contenido original. Representa todo el contenido original. Si el contenido cambia lo más minimo cambia completamente. Para el mismo contenido, siempre genera el mismo.', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_resumen', 'Galder'),
(2, 'Cifrado simétrico', 'En el cifrado simétrico se utilizan sistemas de clave privada. Los objetivos son: Convertir el mensaje en ininteligible. Recuperar la información cifrada. Implementación lo más sencilla posible; Se basan en téncicas de criptografía clásica: Transposición (los caracteres originales simplemente cambian de posición). Sustitución (los caracteres originales se sustituyen por otros).', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_simetrico', 'Galder'),
(3, 'Cifrado asimétrico', 'En el cifrado asimétrico se utilizan sistemas de clave pública. Hay dos claves por usuario: La clave pública que conoce todo el mundo. La clave privada que sólo conoce el usuario; Están relacionadas matemáticamente, lo que una clave cifra sólo lo puede descifrar la otra.', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_asimetrico', 'Galder'),
(4, 'Firma digital', 'Podemos firmar un documento cifrándolo con nuestra clave privada. Como solo se puede descifrar con nuestra clave pública garantizamos que lo hemos firmado nosotros. Con esto se consigue: Sólo el usuario legítimo puede firmar su documento. Nadie podrá falsificar una firma. Cualquiera puede verificar una firma digital. No se puede reutilizar una firma. No se puede modificar una firma. No se puede negar haber firmado un documento. No se puede alterar un documento después de haberlo firmado; Logramos: Autenticidad, Integridad y No repudio.', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_firma', 'Galder'),
(5, 'Certificados digitales', 'Una entidad (Autoridad de Certificación) certifica que el usuario/entidad (su clave pública) es quien dice ser (Depende de la confianza en la AC que lo certifica) y almacena las claves públicas por nosotros. La AC emite un certificado digital. En el certificado digital el CA firma mediante su clave privada la clave pública de un usuario/entidad. Esto se encadena y se crea una jerarquía de ACs. Una AC raíz certifica otras de ACs que certifican usuarios/entidades.', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_certificados', 'Galder'),
(6, 'Comunicaciones seguras', 'Se usa Transport Layer Security (TLS). Comienzo TLS: El cliente le pide al servidor usar TLS. HTTP: cambiar de puerto 80 a 443. Email: comando STARTTLS; TLS hand-shake: El cliente presenta al servidor una lista de algoritmos de cifrado soportados (simetricos, asimetricos, resumen). El servidor elige de esa lista los que soporta. El servidor presenta un certificado al cliente; el cliente valida el certificado (con un CA). El cliente genera una clave de sesión (Cifrado simétrico): El cliente genera un número aleatorio, lo cifra con la clave pública del servidor y se lo envia. En el cliente y el servidor generan una clave compartida a partir de ese número. Usando el algoritmo Diffie-Hellman, se genera un clave secreta compartida; Si el hand-shake ha sido exitoso se establece la conexión propiamente dicha: Los datos transmitidos se cifran con la clave de sesión y su integridad se verifica con los algoritmos resumen consensuados. Es un conexión que mantiene el estado (stateful).', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_comunicaciones', 'Galder'),
(7, 'Bitcoin', 'Bitcoin es un sistema de dinero digital basado en una red a la que cualquiera puede unirse a través de un nodo, y no gobernada por bancos ni gobiernos. Protocolo: Bitcoin (con B) Moneda: bitcoin (con b). Símbolo: BTC o XTC. Satoshi: 0,00000001 BTC. Bitcoin asegura: No repudio: no se puede* deshacer una transacción. Integridad: no se puede* modificar la historia del blockchain. Autenticidad. Pseudo-anonimato. *Es computacionalmente y socialmente muy caro e improbable', 'https://github.com/mikel-egana-aranguren/EHU-SGSSI-01/tree/main/Cifrado_bitcoin', 'Galder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
