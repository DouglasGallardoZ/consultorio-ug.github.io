<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href ="../../assets/css/misEstilos.css" rel="stylesheet" type="text/css"/>
             <script type="text/javascript">
                 function validar(){
                     var form=document.form;
                     
                     if(form.cedula.value==0){
                         alert("El campo cedula esta vacio");
                         form.cedula.value="";
                         form.cedula.focus();
                         return false;
                     }
                      if(form.nombre.value==0){
                         alert("El campo nombre esta vacio");
                         form.nombre.value="";
                         form.nombre.focus();
                         return false;
                     }
                      if(form.apellido.value==0){
                         alert("El campo apellido esta vacio");
                         form.apellido.value="";
                         form.apellido.focus();
                         return false;
                     }
                      if(form.email.value==0){
                         alert("El campo email esta vacio");
                         form.email.value="";
                         form.email.focus();
                         return false;
                     }
                      if(form.fecha.value==0){
                         alert("El campo fecha esta vacio");
                         form.fecha.value="";
                         form.fecha.focus();
                         return false;
                     }
                      if(form.hora.value==0){
                         alert("El campo hora esta vacio");
                         form.hora.value="";
                         form.hora.focus();
                         return false;
                     }
                     if(form.facultad.value==0){
                         alert("El facultad hora esta vacio");
                         form.sexo.value="";
                         form.sexo.focus();
                         return false;
                     }
                     if(form.hora.value==0){
                         alert("El sexo hora esta vacio");
                         form.sexo.value="";
                         form.sexo.focus();
                         return false;
                     }
                     
                 }
                 
                 </script>
        <link rel="stylesheet" href="../../assets/css/PreciadoRonald/misEstilos.css">
        <link rel="stylesheet" href="../../assets/css/PreciadoRonald/misEstilos2.css">
    </head>
    <body>
      
        <div>
            <?php
            include_once "../php/templates/header-2.php"
         ?>
   
        </div>



        
    <center>
         <h1>Solicitar Ficha medica</h1>
        <form name="form" action="#" methods="POST">
            Cedula:<input type="text" name="cedula"placeholder ="Ingrese cedula"><br>
           Nombre:<input type="text" name="nombre"placeholder ="Ingrese nombre"><br>
            
            Apellido:<input type="text" name="apellido"placeholder ="Ingrese apellido"><br>
            email:<input type="text" name="email"placeholder ="Ingrese email"><br>
            
            <label>Sexo :</label><br><!-- comment -->
            <input type="radio" name="sexo">Masculino<br><!-- comment -->
            <input type="radio" name="sexo">Masculino<br><!-- comment -->
             <label>Facultad :</label><br><!-- comment -->
             <select name ="facultad" id="">
                 <option value="">Fisica Matematica</option>
                 <option value="">Medicina</option><!--  <option value="">Fisica Matematica</option> -->
                 <option value="">Odontologia</option><!-- comment -->
                 <option value="">Literatura</option><!-- comment -->
                  <option value="">EducacionFisica</option>
             </select   ><br>
                  <label>Fecha de cita:</label><br><!-- comment -->
                 <input type="date" name="fecha"><br>
                   <label>Hora:</label><br><!-- comment -->
                  <input type="time" name="hora"><br>
                  
                  <input type ="submit">
             </select><br>
             <button onclick="validar();">Enviar Datos</button>
        </form>
        <div></div>
    </center>
       
    <?php
            include_once "../php/templates/footer-2.php"
        ?>
   
    </body>
    
</html>
