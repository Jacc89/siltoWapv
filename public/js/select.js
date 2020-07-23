function listarDepartamentos(){
    $.ajax({
        url:'../controllers/listarDepartamento.php',
        type:'POST'
    }).done(function(resp){
        //alert(resp);
       var data = JSON.parse(resp);
       var cadena = "";
       if(data.length>0){
           for (var i = 0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>"     
               
           }
           $("#departamentos").html(cadena);
           var iddepartamento = $("#departamentos").val();
           listarCiudades(iddepartamento);
       }else{
        cadena +="<option value=''>'NO HAY REGISTROS'</option>" 
           $("#departamentos").html(cadena);
       }

    })
}





function listarCiudades(iddepartamento){
    $.ajax({
        url:'../controllers/listarCiudad.php',
        type:'POST',
        data:{
            iddepartamento:iddepartamento
        }
    }).done(function(resp){
        //alert(resp);
       var data = JSON.parse(resp);
       var cadena = "";
       if(data.length>0){
           for (var i = 0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>"     
               
           }
           $("#ciudades").html(cadena);

       }else{
        cadena +="<option value=''>'NO HAY REGISTROS'</option>" 
           $("#ciudades").html(cadena);
       }

    })
}



function listarDepartamentos_Editar(){
  
    $.ajax({
        url:'../controllers/listarDepartamento.php',
        type:'POST'
    }).done(function(resp){
  
       var data = JSON.parse(resp);
       var cadena = "";
       if(data.length>0){
           for (var i = 0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>"     
               
           }
           $("#departamentos_editar").html(cadena);
           var iddepartamento = $("#departamentos_editar").val();
           listarCiudades_Editar(iddepartamento);
       }else{
        cadena +="<option value=''>'NO HAY REGISTROS'</option>" 
           $("#departamentos_editar").html(cadena);
       }

    })
}





function listarCiudades_Editar(iddepartamento){
    $.ajax({
        url:'../controllers/listarCiudad.php',
        type:'POST',
        data:{
            iddepartamento:iddepartamento
        }
    }).done(function(resp){
        //alert(resp);
       var data = JSON.parse(resp);
       var cadena = "";
       if(data.length>0){
           for (var i = 0; i < data.length; i++) {
              cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>"     
               
           }
           $("#ciudades_editar").html(cadena);

       }else{
        cadena +="<option value=''>'NO HAY REGISTROS'</option>" 
           $("#ciudades_editar").html(cadena);
       }

    })
}





