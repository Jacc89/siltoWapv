<?php
    class Producto extends Controller{
        //funcion de constructor de producto
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }
        //funcion de renderisa la vista por defecto
        function render(){
            $productos = $this->view->datos = $this->model->read();
            $this->view->productos = $productos;
            $this->view->render('admin/listaproducto');
        }
        //funcion de crear registros en base de datos
        function crear(){
            if(isset($_POST["nombre"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Producto creado correctamente";
                    $productos = $this->view->datos = $this->model->read();
                    $this->view->productos = $productos;
                    $this->view->render('admin/listaproducto');
                }else{
                    $this->view->mensaje = "Producto ya existe";
                    $this->view->render('admin/listaproducto');
                }
            }else{
                $this->view->render('admin/crearproducto');
            }
        }
         //funcion de leer datos de la base de datos con ayuda de  readbyid
         function leer($param = null){
            $id_producto = $param[0];
            $producto = $this->model->readById($id_producto);

            //session_start();
            $_SESSION["id_verProducto"] = $producto->id_producto;

            $this->view->producto = $producto;
            $this->view->render('admin/editarproducto');
        }
        //funcion de editar los registros
        function editar($param = null){
            if($this->model->update($_POST)){
                $producto = new ProductoDAO();


                //session_start();
            $id = $_SESSION["id_verProducto"];
            unset($_SESSION['id_verProducto']);

                $producto->id_producto = $id;
                $producto->id_producto = $_POST['id_producto'];
                $producto->nombre      = $_POST['nombre'];
                $producto->costo       = $_POST['costo'];

                $this->view->producto  = $producto;
                $this->view->mensaje   = "Producto actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al producto";
            }
            $productos = $this->view->datos = $this->model->read();
            $this->view->productos = $productos;
            $this->view->render('admin/listaproducto');
        }
        //Funcion de eliminar registros de la base de datos.
        function eliminar($param = null){
            $id = $param[0];
            if($this->model->delete($id)){
                $mensaje ="Producto eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el producto";$this->view->mensaje = "No se pudo eliminar el producto";
            }
            echo $mensaje;
        }
    }
?>