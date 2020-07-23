<?php
include_once('models/usuario.php');

class UsuarioModel extends Model{
    public function __construct(){
        parent::__construct();
    }


    public function create($datos = null){
        $sentenceSQL="INSERT INTO usuario (identificacion, nombre, apellido, email, pass, telefono, whatsapp, cargo, estado, foto) VALUES (:identificacion, :nombre, :apellido, :email, :pass, :telefono, :whatsapp, :cargo, :estado, :foto)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);

        $foto= "public/img/usuarios/".$_FILES['foto']['name'];
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
            
        try{
            $query->execute([
    
                'identificacion'   => $datos['identificacion'],
                'nombre'    => $datos['nombre'],
                'apellido'  => $datos['apellido'],
                'email'     => $datos['email'],
                'pass'             => md5($datos['pass']),
                'telefono'  => $datos['telefono'],
                'whatsapp'  => $datos['whatsapp'],
                'cargo'            => $datos['cargo'],
                'estado'           => $datos['estado'],
                'foto'             => "public/img/usuarios/".$_FILES['foto']['name']
            ]);
            return true;

        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }     


    public function read(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM usuario');
            
            while($row = $query->fetch()){
                $item = new UsuarioDAO();
                $item->identificacion    = $row['identificacion'];
                $item->nombre     = $row['nombre'];
                $item->apellido   = $row['apellido'];
                $item->email      = $row['email'];
                $item->telefono   = $row['telefono'];
                $item->whatsapp   = $row['whatsapp'];
                $item->cargo             = $row['cargo'];
                $item->estado            = $row['estado'];
                $item->fecha_ingreso     = $row['fecha_ingreso'];
                $item->foto              = $row['foto'];
              
                array_push($items, $item);

                if ($row['identificacion']==$_SESSION['identificacion']) {
                    $_SESSION['upd_nomb'] = $row['nombre'];
                    $_SESSION['upd_foto'] = $row['foto'];
                    
                }
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
        $item = new UsuarioDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM usuario WHERE identificacion = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->identificacion    = $row['identificacion'];
                $item->nombre     = $row['nombre'];
                $item->apellido   = $row['apellido'];
                $item->email      = $row['email'];
                $item->telefono   = $row['telefono'];
                $item->pass              = $row['pass'];
                $item->whatsapp   = $row['whatsapp'];
                $item->cargo             = $row['cargo'];
                $item->estado            = $row['estado'];
                $item->fecha_ingreso     = $row['fecha_ingreso'];
                $item->foto              = $row['foto'];

                if ($row['identificacion']==$_SESSION['identificacion']) {
                    $_SESSION['upd_nomb'] = $row['nombre'];
                    $_SESSION['upd_foto'] = $row['foto'];
                    
                }
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
        $query = $this->db->connect()->prepare('UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :email, telefono = :telefono, whatsapp = :whatsapp, cargo = :cargo, estado = :estado, foto = :foto WHERE identificacion = :identificacion');

        $foto = $_FILES['foto']['name'];
        $fotoriginal=$_POST['fotoriginal'];

        if (empty($foto)) {
            $foto = $fotoriginal;
        } else {
            $foto="public/img/usuarios/".$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
            unlink($fotoriginal);
        }
        
        try{
            $query->execute([

                'identificacion'  => $item['identificacion'],
                'nombre'          => $item['nombre'],
                'apellido'        => $item['apellido'],
                'email'           => $item['email'],
                // 'pass'            => $pass,
                'telefono'        => $item['telefono'],
                'whatsapp'        => $item['whatsapp'],
                'cargo'           => $item['cargo'],
                'estado'          => $item['estado'],
                'foto'            => $foto,
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
        $query = $this->db->connect()->prepare('DELETE FROM usuario WHERE identificacion = :identificador');
        try{
            $query->execute([
                'identificador' => $id
            ]);
            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }    
}