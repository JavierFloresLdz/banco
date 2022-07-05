<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    class Conexion extends PDO
    {
        private $tipo_de_base = 'mysql';
        private $host = 'localhost';
        private $nombre_de_base = 'citibanamex';
        private $usuario = 'root';
        private $contrasena = '';
        public function __construct()
        {
            try {
                parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena);
            } catch (PDOExeption $e) {
                echo "Ha surgido un error y no se puede conectar a la B.D. DETALLE: " . $e->getMessage();
            }
        }
    }
    ?>
</body>

</html>