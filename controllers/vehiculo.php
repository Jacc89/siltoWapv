<?php
    class Vehiculo extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $vehiculos = $this->view->datos = $this->model->read();
        $this->view->vehiculos = $vehiculos;
            $this->view->render('admin/listavehiculo');
        }
        function crear(){
            if(isset($_POST["placa"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "registro correctamente el vehiculo";
                    $vehiculos = $this->view->datos = $this->model->read();
                    $this->view->vehiculos = $vehiculos;
                    $this->view->render('admin/listavehiculo');
                }else{

                    $this->view->mensaje = "El vehiculo  ya existe 1";
                    $this->view->render('admin/crearvehiculo');
                }
            }else{
                $usuarios = $this->view->datos['ddl_usuarios'] = $this->model->cargarEncargado();
                $this->view->ddl_usuarios = $usuarios;
                $this->view->render('admin/crearvehiculo');
            }
        }

        function leer($param = null){
            $placa = $param[0];
            $vehiculo = $this->model->readById($placa);

            //session_start();
            $_SESSION["id_verVehiculo"] = $vehiculo->placa;
            $usuarios = $this->view->datos['ddl_usuarios'] = $this->model->cargarEncargado();
            $this->view->ddl_usuarios = $usuarios;

            $this->view->vehiculo = $vehiculo;
            $this->view->render('admin/editarvehiculo');
        }

        function editar($param = null){
            //session_start();
            $id = $_SESSION["id_verVehiculo"];
            unset($_SESSION["id_verVehiculo"]);

            if($this->model->update($_POST)){
                $vehiculo = new VehiculoDao();

                $vehiculo->placa = $id;
               //$vehiculo->placa = $_POST['placa'];
                $vehiculo->capacidad = $_POST['capacidad'];
                $vehiculo->seguro = $_POST['seguro'];
                $vehiculo->tecnomecanica = $_POST['tecnomecanica'];
                $vehiculo->tipo_vehiculo = $_POST['tipo_vehiculo'];
                $vehiculo->identificacion = $_POST['identificacion'];
                $vehiculo->gps = $_POST['gps'];
                $vehiculo->estado = $_POST['estado'];
                // $vehiculo->fecha_registro = $_POST['fecha_registro'];

                $this->view->vehiculo = $vehiculo;
                $this->view->mensaje = "vehiculo actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar el vehiculo";
            }
            $vehiculos = $this->view->datos = $this->model->read();
            $this->view->vehiculos = $vehiculos;
            $this->view->render('admin/listavehiculo');
        }

        function eliminar($param = null){
            $id = $param[0];

            if($this->model->delete($id)){
                $mensaje ="vehiculo eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el vehiculo";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
            echo $mensaje;
        }
    }
?>