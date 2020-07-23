<?php
    class Solicitud extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $solicitudes = $this->view->datos = $this->model->read();
            $this->view->solicitudes = $solicitudes;
            $this->view->render('admin/listasolicitud');
        }
        // funcion para leer los datos de la base de datos
        function leer($param = null){
            $id_solicitud = $param[0];
            $solicitud = $this->model->readById($id_solicitud);

            //session_start();
            $_SESSION["id_verSolicitud"] = $solicitud->id_solicitud;
            $usuarios = $this->view->datos['ddl_usuarios'] = $this->model->cargarEncargado();
            $this->view->ddl_usuarios = $usuarios;
            $centros = $this->view->datos['ddl_centros'] = $this->model->cargarCentro();
            $this->view->ddl_centros = $centros;

            $this->view->solicitud = $solicitud;
            $this->view->render('admin/editarsolicitud');
        }
        // funcion crear  data en base de  datos
        function crear(){
            if(isset($_POST["descripcion"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Solicitud creada correctamente";
                    $solicitudes = $this->view->datos = $this->model->read();
                    $this->view->solicitudes = $solicitudes;
                    $this->view->render('admin/listasolicitud');
                }else{

                    $this->view->mensaje = "La solicitud ya existe.";
                    $this->view->render('admin/listasolicitud');
                }
            }else{
                $usuarios = $this->view->datos['ddl_usuarios'] = $this->model->cargarEncargado();
                $this->view->ddl_usuarios = $usuarios;
                $centros = $this->view->datos['ddl_centros'] = $this->model->cargarCentro();
                $this->view->ddl_centros = $centros;
                $this->view->render('admin/crearsolicitud');
            }
           
        }
        
        // funcion editar la data de la base de datos.
        function editar($param = null){
            //session_start();
            $id = $_SESSION["id_verSolicitud"];
            unset($_SESSION['id_verSolicitud']);

            if($this->model->update($_POST)){
                $solicitud = new SolicitudDAO();

                $solicitud->id_solicitud     = $id;
                //$solicitud->id_solicitud     = $_POST['id_solicitud'];
                //$solicitud->solicitud        = $_POST['solicitud'];
                //$solicitud->descripcion        = $_POST['descripcion'];
               //$solicitud->id_centro          = $_POST['id_centro'];
               // $solicitud->identificacion    = $_POST['identificacion'];

                $this->view->solicitud = $solicitud;
                $this->view->mensaje = "Solicitud actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar la solicitud";
            }
            $solicitudes = $this->view->datos = $this->model->read();
            $this->view->solicitudes = $solicitudes;
            $this->view->render('admin/listasolicitud');
        }

        function eliminar($param = null){
            $id = $param[0];

            if($this->model->delete($id)){
                $mensaje ="Solicitud eliminada correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar la solicitud";
                $this->view->mensaje = "No se pudo eliminar la solicitud";
            }
            //$this->render();
            echo $mensaje;
        }
    }
?>