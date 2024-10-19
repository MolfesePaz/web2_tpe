<?php
    require_once "config.php";

class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST ,MYSQL_USER, MYSQL_PASS);

        $this->db->exec("CREATE DATABASE IF NOT EXISTS `" . MYSQL_DB . "` CHARACTER SET utf8 COLLATE utf8_general_ci");

        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);

        $this->deploy();
    }

    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $contraseña = '$2y$10$IVORXtjzJQbw6tnGo4iqReoqk.MFvc/6gHUPzkZqXJUB9dY.hDZLq';
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
             $sql = <<<END
                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;

                --
                -- Base de datos: `viajeslupa`
                --

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `empresa`
                --

                CREATE TABLE `empresa` (
                `id_empresa` int(11) NOT NULL,
                `nombre` varchar(100) NOT NULL,
                `fecha_inicio` date NOT NULL,
                `ubicacion` varchar(140) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `empresa`
                --

                INSERT INTO `empresa` (`id_empresa`, `nombre`, `fecha_inicio`, `ubicacion`) VALUES
                (1, 'ZenAir', '2015-06-23', 'Buenos Aires, Argentina');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `usuarios`
                --

                CREATE TABLE `usuarios` (
                `id` int(11) NOT NULL,
                `nombre` varchar(250) NOT NULL,
                `contraseña` char(64) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `usuarios`
                --

                INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`) VALUES
                (1, 'webadmin', $contraseña);

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `viajes`
                --

                CREATE TABLE `viajes` (
                `id_viaje` int(11) NOT NULL,
                `origen` varchar(60) NOT NULL,
                `destino` varchar(50) NOT NULL,
                `FechaDeSalida` date NOT NULL,
                `FechaDeLlegada` date NOT NULL,
                `id_empresa` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `viajes`
                --

                INSERT INTO `viajes` (`id_viaje`, `origen`, `destino`, `FechaDeSalida`, `FechaDeLlegada`, `id_empresa`) VALUES
                (2, 'Buenos Aires, Ezeiza', 'Brasil, Brasilia', '2025-02-05', '2025-02-05', 1),
                (3, 'Buenos Aires, Ezeiza', 'Italia, Roma', '2024-12-18', '2024-12-26', 1),
                (4, 'Buenos Aires, Ezeiza', 'España, Madrid', '2025-07-16', '2025-07-30', 1),
                (6, 'Buenos Aires, Ezeiza', 'Estados Unidos, Florida', '2025-01-15', '2025-01-25', 1),
                (8, 'Buenos Aires, Ezeiza', 'Paris, Francia', '2025-01-02', '2025-01-08', 1),
                (10, 'Buenos Aires, Ezeiza', 'Grecia, Atenas', '2024-10-24', '2024-10-25', 1),
                (12, 'Buenos Aires, Ezeiza', 'Australia, Canberra', '2024-12-27', '2024-12-28', 1);

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `empresa`
                --
                ALTER TABLE `empresa`
                ADD PRIMARY KEY (`id_empresa`);

                --
                -- Indices de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                ADD PRIMARY KEY (`id`);

                --
                -- Indices de la tabla `viajes`
                --
                ALTER TABLE `viajes`
                ADD PRIMARY KEY (`id_viaje`),
                ADD UNIQUE KEY `id_viaje` (`id_viaje`,`id_empresa`),
                ADD KEY `id_empresa` (`id_empresa`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `empresa`
                --
                ALTER TABLE `empresa`
                MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

                --
                -- AUTO_INCREMENT de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

                --
                -- AUTO_INCREMENT de la tabla `viajes`
                --
                ALTER TABLE `viajes`
                MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `viajes`
                --
                ALTER TABLE `viajes`
                ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
                COMMIT;

                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
            END;
            $this->db->query($sql);
        }
    }
}

                    
    
