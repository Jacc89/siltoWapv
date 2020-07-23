<?php
include_once('models/usuario.php');

class Pass_UsuModel extends Model{
    public function __construct(){
        parent::__construct();
    }    


    public function read(){
        $items = [];
        $id = $_SESSION['usuactual'];
        try{
            $query = $this->db->connect()->query("SELECT * FROM usuario WHERE identificacion = '$id'");
            
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
        $query = $this->db->connect()->prepare('UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :email, pass = :pass, telefono = :telefono, whatsapp = :whatsapp, cargo = :cargo, estado = :estado, foto = :foto WHERE identificacion = :identificacion');

        $fotoriginal=$_POST['fotoriginal'];
        $foto = $fotoriginal;

        try{
            $query->execute([

                'identificacion'  => $item['identificacion'],
                'nombre'          => $item['nombre'],
                'apellido'        => $item['apellido'],
                'email'           => $item['email'],
                'pass'           => md5($item['pass']),
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
?>