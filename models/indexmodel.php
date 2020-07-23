<?php

class IndexModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function consultarUsuario($email, $password)
    {
        $result = "";
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM usuario WHERE email = :email and pass=:clave');

            $query->execute([
                'email' => $email,
                'clave' =>  md5($password)
            ]);

            if ($row = $query->fetch()) {
                $result = $row['identificacion'];
                //se le asigna a una variable de sesion un indice (resultado de la consulta fetch)
                $_SESSION['cargo'] = $row['cargo'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['foto'] = $row['foto'];
                $_SESSION['identificacion']= $row['identificacion'];

                if ($row['estado'] == "inactivo") {
                    $result = "inactivo";
                } elseif ($row['cargo'] == "conductor") {
                    $result = "conductor";
                }
            
            }
            return $result;
        } catch (PDOException $e) {
            if (constant("DEBUG")) {
                echo $e->getMessage();
            }
            return null;
        }
    }
}
