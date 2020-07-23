<?php
    class Centro extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $centros = $this->view->datos = $this->model->read();
             $this->view->centros = $centros;
            $this->view->render('admin/listacentro');
        }
        function crear(){
            if(isset($_POST["nombre"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Centro creado correctamente";
                    $centros = $this->view->datos = $this->model->read();
                    $this->view->centros = $centros;
                    $this->view->render('admin/listacentro');
                }else{
                    $this->view->mensaje = "El centro ya existe ";
                    $this->view->render('admin/listacentro');
                }
            }else{
                $usuarios = $this->view->datos['ddl_usuarios'] = $this->model->cargarEncargado();
                $this->view->ddl_usuarios = $usuarios;
                $departamentos = $this->view->datos['ddl_departamentos'] = $this->model->cargarDepartamento();
                $this->view->ddl_departamentos = $departamentos;
               
                $this->view->render('admin/crearcentro');
            }
        }
        function leer($param = null){
            $id_centro = $param[0];
            $centro = $this->model->readById($id_centro);

            //session_start();
            $_SESSION["id_verCentro"] = $centro->id_centro;
            $usuarios = $this->view->datos['ddl_usuarios'] = $this->model->cargarEncargado();
            $this->view->ddl_usuarios = $usuarios;
            $departamentos = $this->view->datos['ddl_departamentos'] = $this->model->cargarDepartamento();
            $this->view->ddl_departamentos = $departamentos;
            $this->view->centro = $centro;
            $this->view->render('admin/editarcentro');
        }
        function editar($param = null){
            //session_start();
            $id = $_SESSION["id_verCentro"];
            unset($_SESSION['id_verCentro']);
    
            if($this->model->update($_POST)){
                $centro = new CentroDAO();

                $centro->id_centro     = $id;
                //$centro->id_centro     = $_POST['id_centro'];
                //$centro->nombre        = $_POST['nombre'];
                $centro->email         = $_POST['email'];
                $centro->telefono      = $_POST['telefono'];
                $centro->whatsapp      = $_POST['whatsapp'];
                $centro->departamento  = $_POST['departamento'];
                $centro->ciudad        = $_POST['ciudad'];
                $centro->identificacion = $_POST['identificacion'];
                $centro->tipo_centro         = $_POST['tipo_centro'];
                $centro->direccion         = $_POST['direccion'];
    
                
                $this->view->centro = $centro;
                $this->view->mensaje = "Centro actualizado correctamente";
            }else{
                
                $this->view->mensaje = "No se pudo actualizar al centro";
            }
            
            $centros = $this->view->datos = $this->model->read();
            $this->view->centros = $centros;
            $this->view->render('admin/listacentro');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Centro eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el Centro";
                $this->view->mensaje = "No se pudo eliminar el centro";
            }
            //$this->render();
            echo $mensaje;
        }
    }
?>