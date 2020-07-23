<?php
class Perfil extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
    }


    function render(){       
        $usuarios = $this->view->datos['usuarios'] = $this->model->read();
        $this->view->usuarios = $usuarios;
        $this->view->render('admin/verperfil');
    }


    function leer($param = null){
        $identificacion = $param[0];
        $usuario = $this->model->readById($identificacion);

        $_SESSION["identificacion"] = $usuario->identificacion;

        $this->view->usuario = $usuario;
        $this->view->render('admin/editarperfil');
    }


    function editar($param = null){

        if($this->model->update($_POST)){
            $usuario = new PerfilDAO();
            $usuario->identificacion = $_POST['identificacion'];
            $usuario->nombre         = $_POST['nombre'];
            $usuario->apellido       = $_POST['apellido'];
            $usuario->email          = $_POST['email'];
            $usuario->telefono       = $_POST['telefono'];
            $usuario->whatsapp       = $_POST['whatsapp'];
            $usuario->cargo          = $_POST['cargo'];
            $usuario->estado         = $_POST['estado'];

            $this->view->usuario = $usuario;
            $this->view->mensaje = "perfil actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar el Perfil";
        }

        $id = $_SESSION["identificacion"];
  
        $usuarios = $this->view->datos = $this->model->read($id);
        $this->view->usuarios = $usuarios;
        $this->view->render('admin/verperfil');
    }
}