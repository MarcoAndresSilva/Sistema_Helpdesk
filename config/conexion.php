    <?php
        session_start();

        class Conectar {
            protected $dbh;
            protected function Conexion () {
                try {
                    $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=sistema_helpdesk","root","");
                    return $conectar;

                } catch (Exception $e) {
                    print "¡Error DB !: ".$e->getMessage()."<br/>";
                    die();
                }
            }
            //se agrega funcion para los caracteres especiales
            public function set_names () {
                return $this->dbh->query("SET NAMES 'utf8'");
            }

            public function ruta () {
                return "http://localhost/sistema_helpdesk/";
            }
        }


    ?>