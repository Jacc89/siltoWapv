<?php
class Pass_Usu extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
    }


    function render(){       
        $usuarios = $this->view->datos['usuarios'] = $this->model->read();
        $this->view->usuarios = $usuarios;
        $this->view->render('admin/editarusuario');
    }


    function leer($param = null){
        $identificacion = $param[0];
        $_SESSION['usuactual']=$identificacion;
        $usuario = $this->model->readById($identificacion);

        $this->view->usuario = $usuario;
        $this->view->render('admin/editarpassusu');
    }


    function editar($param = null){

        if($this->model->update($_POST)){
            $usuario = new UsuarioDAO();
            $usuario->identificacion = $_POST['identificacion'];
            $usuario->nombre         = $_POST['nombre'];
            $usuario->apellido       = $_POST['apellido'];
            $usuario->email          = $_POST['email'];
            $usuario->pass           = $_POST['pass'];
            $usuario->telefono       = $_POST['telefono'];
            $usuario->whatsapp       = $_POST['whatsapp'];
            $usuario->cargo          = $_POST['cargo'];
            $usuario->estado         = $_POST['estado'];
            $usuario->foto         = $_POST['fotoriginal'];

            $this->view->usuario = $usuario;
            $this->view->mensaje = "El Password ha sido reestablecido exitosamente";

            $id = $_POST['identificacion'];
  
            $usuarios = $this->view->datos = $this->model->read($id);
            $this->view->usuarios = $usuarios;
            $this->view->render('admin/editarusuario');
        }else{
            $id = $_SESSION["identificacion"];
            header('location: leer');
        }
    }
}