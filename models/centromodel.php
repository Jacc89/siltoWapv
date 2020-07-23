<?php
    include_once('models/centro.php');
    include_once('models/usuario.php');

    class CentroModel extends Model{
        function __construct(){
            parent::__construct();
        }
        public function create($datos = null){
            // insertar
            //if(!isset($datos)){
                $sentenceSQL="INSERT INTO centro( id_centro, nombre, email, telefono, whatsapp, departamento, ciudad, identificacion, tipo_centro, direccion) VALUES( :id_centro, :nombre, :email, :telefono, :whatsapp, :departamento, :ciudad, :identificacion, :tipo_centro, :direccion)";
                $connexionDB=$this->db->connect();
                $query = $connexionDB->prepare($sentenceSQL);

                try{
                    $query->execute([
                                    'id_centro'       =>$datos['id_centro'], 
                                    'nombre'          => $datos['nombre'],
                                    'email'           => $datos['email'],
                                    'telefono'        => $datos['telefono'],
                                    'whatsapp'        => $datos['whatsapp'],
                                    'departamento'    => $datos['departamento'],
                                    'ciudad'          => $datos['ciudad'],
                                    'identificacion'  => $datos['identificacion'],
                                    'tipo_centro'           => $datos['tipo_centro'],
                                    'direccion'           => $datos['direccion']

                    ]);
                    return true;
                }catch(PDOException $e){
                if(constant("DEBUG")){
                        echo $e->getMessage();
                }

                    return false;
                }
            // }else{
            //     return false;
            // }

        }
        public function read(){
            $items = [];
            try{
                $query = $this->db->connect()->query('SELECT cent.id_centro, cent.nombre as nombrecentro, cent.email, cent.telefono, cent.whatsapp, depa.departamento, cent.ciudad, usu.nombre as nombreusuario, cent.tipo_centro, cent.direccion 
                FROM centro as cent
                INNER JOIN departamentos as depa on depa.idDepa=cent.departamento
                INNER JOIN usuario as usu on usu.identificacion=cent.identificacion

                ');

                while($row = $query->fetch()){
                    $item = new CentroDAO();
                    $item->id_centro        = $row['id_centro'];
                    $item->nombre           = $row['nombrecentro'];
                    $item->email            = $row['email'];
                    $item->telefono         = $row['telefono'];
                    $item->whatsapp         = $row['whatsapp'];
                    $item->departamento     = $row['departamento'];
                    $item->ciudad           = $row['ciudad'];
                    $item->identificacion   = $row['nombreusuario'];
                    $item->tipo_centro      = $row['tipo_centro'];
                    $item->direccion        = $row['direccion'];

                    array_push($items, $item);
                }
                return $items;
            }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
                return [];
            }
        }
        public function readById($id){
            $item = new CentroDAO();
            try{
                $query = $this->db->connect()->prepare('SELECT  id_centro, nombre , email,  telefono,  whatsapp, departamento, ciudad, identificacion, tipo_centro, direccion 
                FROM centro WHERE id_centro = :id');

                $query->execute(['id' => $id]);

                while($row = $query->fetch()){
                    $item->id_centro       = $row['id_centro'];
                    $item->nombre          = $row['nombre'];
                    $item->email           = $row['email'];
                    $item->telefono        = $row['telefono'];
                    $item->whatsapp        = $row['whatsapp'];
                    $item->departamento    = $row['departamento'];
                    $item->ciudad          = $row['ciudad'];
                    $item->identificacion  = $row['identificacion'];
                    $item->tipo_centro           = $row['tipo_centro'];
                    $item->direccion           = $row['direccion'];
                }
                return $item;
            }catch(PDOException $e){
                if(constant("DEBUG")){
                    echo $e->getMessage();
                }
                return null;
            }
        }
        public function update($item){
            $query = $this->db->connect()->prepare('UPDATE centro SET  email = :email, telefono = :telefono, whatsapp = :whatsapp, departamento = :departamento, ciudad = :ciudad, identificacion = :identificacion, tipo_centro = :tipo_centro, direccion = :direccion WHERE id_centro = :id_centro');
            try{
                $query->execute([
                    'id_centro'      => $item['id_centro'],
                    //'nombre'       => $item['nombre'],
                    'email'          => $item['email'],
                    'telefono'       => $item['telefono'],
                    'whatsapp'       => $item['whatsapp'],
                    'departamento'   => $item['departamento'],
                    'ciudad'         => $item['ciudad'],
                    'identificacion' => $item['identificacion'],
                    'tipo_centro'          => $item['tipo_centro'],
                    'direccion'          => $item['direccion']
                ]);
                return true;
            }catch(PDOException $e){
                if(constant("DEBUG")){
                    echo $e->getMessage();
                }
                return false;
            }
        }
        public function delete($id){
            $query = $this->db->connect()->prepare('DELETE FROM centro WHERE id_centro = :id');
            try{
                $query->execute([
                    'id' => $id
                ]);
                return true;
            }catch(PDOException $e){
                if(constant("DEBUG")){
                    echo $e->getMessage();
                }
                return false;
            }
        }

        public function cargarEncargado(){
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT identificacion, nombre, apellido, cargo FROM usuario where cargo = "bodeguero"');
                
                include_once('models/usuario.php');
                while ($row = $query->fetch()) {
                    $item = new UsuarioDAO();
                    $item->identificacion = $row['identificacion'];
                    $item->nombre = $row['nombre'];
                    $item->apellido = $row['apellido'];
                    $item->cargo = $row['cargo'];
                   
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                if (constant("DEBUG")) {
                    echo $e->getMessage();
                }
                return [];
            }
        }
        public function cargarDepartamento(){
            $items = [];
            try {
                $query = $this->db->connect()->query('SELECT idDepa, departamento FROM departamentos');
                include_once('models/departament.php');
                while ($row = $query->fetch()) {
                    $item = new DepartamentDAO();
                    $item->idDepa = $row['idDepa'];
                    $item->departamento = $row['departamento'];
                    
                   
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                if (constant("DEBUG")) {
                    echo $e->getMessage();
                }
                return [];
            }
        }
    }


?>