const items = document.querySelectorAll(".bEliminar");
items.forEach(item => {
    item.addEventListener("click", function(){
        const id = this.dataset.id;
        const controlador = this.dataset.controlador;
        const accion=this.dataset.accion;
        const url=this.dataset.url;

        const confirm = window.confirm("¿Desea eliminar el registro "+id+"?");

        if(confirm){
            httpRequest(url+controlador+"/"+accion+"/" + id, function(e){
                //console.log(this.responseText);
                document.querySelector("#respuesta").innerHTML = this.responseText;
                const tbody = document.querySelector("#tbody-data");
                const fila  = document.querySelector("#fila-" + id);
              
                tbody.removeChild(fila);
            })
        }
    });
});
// const items1 = document.querySelectorAll(".bEliminar2");
// items1.forEach(item => {
//     item.addEventListener("click", function(){
//         const id = this.dataset.id;
//         const controlador = this.dataset.controlador;
//         const key = this.dataset.key;
//         const accion=this.dataset.accion;

//         const confirm = window.confirm("Deseas eliminar el elemento?");

//         if(confirm){
//             httpRequest("<?php echo constant('URL'); ?>"+controlador+"/"+accion+"/" + key, function(e){
//                 console.log(this.responseText);
//                 const tbody = document.querySelector("#tbody-data");
//                 const fila  = document.querySelector("#fila-" + id);
              
//                 tbody.removeChild(fila);
//             })
//         }
//     });
// });
function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}

// function validatePassword(){
//     var password = document.getElementById("constrasena");
//     var confirm_password = document.getElementById("con_constrasena");
//   if(document.getElementById("constrasena").value != document.getElementById("con_constrasena").value) {
//     //alert("Las contraseñas deben ser iguales");
//     document.getElementById("con_constrasenaHelp").textContent="Las contraseñas deben ser iguales";
//     document.getElementById("con_constrasenaHelp").className="alert alert-danger";
//     document.getElementById("con_constrasenaHelp").focus;
//     document.getElementById("btn_crear").disabled = true;
//         //confirm_password.setCustomValidity("Las contraseñas deben ser iguales");
//   } else {
//     document.getElementById("con_constrasenaHelp").style.display= 'none';
//     document.getElementById("btn_crear").disabled = false;
//     //confirm_password.setCustomValidity('');
//   }
// }



// Permitir ver el contenido de los campos password del perfil
function verPassword() {
    var z = document.getElementById("passant");
    var x = document.getElementById("pass");
    var y = document.getElementById("passy");
    
    if (x.type === "password" && y.type === "password" && z.type === "password") {
      x.type = "text";
      y.type = "text";
      z.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
      z.type = "password";
    }
}


// Permitir ver el contenido de los campos password de usuario formulario editar pass usuario
function verPassword2() {
    // console.log("pass2ej");

    var x = document.getElementById("pass");
    var y = document.getElementById("passy");
    
    if (x.type === "password" && y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
}


function validapassword() {

    var pass1 = document.getElementById("pass");
    var pass_c = document.getElementById("passy");

    if(pass1.value != pass_c.value){
        document.getElementById("alerta").innerHTML = '<div class="alert alert-danger"><a href="" class="close" data-dismiss="alert">&times;</a>Los passwords no coinciden, digítelos nuevamente</div>';
        pass1.value="";
        pass_c.value="";
        pass1.focus();
        return false;
      }else{
          document.getElementById("alerta").innerHTML = "";
  
    }  
}