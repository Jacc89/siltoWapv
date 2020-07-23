<?php
include_once('models/perfil.php');

class PerfilModel extends Model{
    public function __construct(){
        parent::__construct();
    }


    public function read(){
        $items = [];
        $id = $_SESSION['identificacion'];

        try{
            $query = $this->db->connect()->query("SELECT * FROM usuario WHERE identificacion = '$id'");

            while($row = $query->fetch()){
                $item = new PerfilDAO();
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
                $_SESSION['upd_nomb'] = $row['nombre'];
                $_SESSION['upd_foto'] = $row['foto'];
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
        $item = new PerfilDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM usuario WHERE identificacion = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->identificacion   = $row['identificacion'];
                $item->nombre           = $row['nombre'];
                $item->apellido         = $row['apellido'];
                $item->email            = $row['email'];
                $item->telefono         = $row['telefono'];
                $item->pass             = $row['pass'];
                $item->whatsapp         = $row['whatsapp'];
                $item->cargo            = $row['cargo'];
                $item->estado           = $row['estado'];
                $item->fecha_ingreso    = $row['fecha_ingreso'];
                $item->foto             = $row['foto'];

                $_SESSION['upd_nomb'] = $row['nombre'];
                $_SESSION['upd_foto'] = $row['foto'];
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
}
