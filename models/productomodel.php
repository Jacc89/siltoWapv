<?php
    include_once('models/producto.php');

    class ProductoModel extends Model{
        function __construct(){
            parent::__construct();
        }

        public function read(){
            $items = [];
            try{
                $query = $this->db->connect()->query('SELECT * FROM producto');

                while($row = $query->fetch()){
                    $item = new ProductoDAO();
                    
                    $item->id_producto = $row['id_producto'];
                    $item->nombre      = $row['nombre'];
                    $item->costo       = $row['costo'];

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
            $item = new ProductoDAO();
            try{
                $query = $this->db->connect()->prepare('SELECT * FROM producto WHERE id_producto = :id');

                $query->execute(['id' => $id]);

                while($row = $query->fetch()){
                    $item->id_producto = $row['id_producto'];
                    $item->nombre      = $row['nombre'];
                    $item->costo        = $row['costo'];
                    
                }
                return $item;
            }catch(PDOException $e){
                if(constant("DEBUG")){
                    echo $e->getMessage();
                }
                return null;
            }
        }
        public function create($datos = null){
            // insertar
            //if(!isset($datos)){
                $sentenceSQL="INSERT INTO producto( id_producto, nombre, costo) VALUES( :id_producto, :nombre, :costo )";
                $connexionDB=$this->db->connect();
                $query = $connexionDB->prepare($sentenceSQL);

                try{
                    $query->execute([
                                    'id_producto' => $datos['id_producto'],
                                    'nombre'      => $datos['nombre'],
                                    'costo'        => $datos['costo']
                                    
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

        public function update($item){
            $query = $this->db->connect()->prepare('UPDATE producto SET nombre = :nombre, costo = :costo WHERE id_producto = :id_producto');
            try{
                $query->execute([
                    'id_producto' => $item['id_producto'],
                    'nombre'      => $item['nombre'],
                    'costo'        => $item['costo']
                    
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
            $query = $this->db->connect()->prepare('DELETE FROM producto WHERE id_producto = :id');
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
    }
?>