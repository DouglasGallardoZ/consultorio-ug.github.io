function validar() {
    namee = document.getElementById("name").value;
    if(namee.length==0 || /^\s+$/.test(namee)){
        alert("No ha ingresado correctamente su nombre");
    }

    lastName = document.getElementById("lastName").value;
    if(lastName.length==0 || /^\s+$/.test(lastName)){
        alert("No ha ingresado correctamente su apellido");
    }

    email = document.getElementById("email").value;
    if(email.length==0 || /^\s+$/.test(email)){
        alert("No ha ingresado correctamente su correo");
    }

    phone = document.getElementById("phone").value;
    if(phone.length==0 || /^\s+$/.test(phone) || isNaN(phone)){
        alert("No ha ingresado correctamente su numero de telefono");
    }

    var age = document.getElementById("age");
    if (age.value==0 || age.value=="") {
        alert ("Debe seleccionar si es o no mayor de edad para continuar");
        age.focus();
    }

    comment = document.getElementById("comment").value;
    if(comment.length==0 || /^\s+$/.test(comment)){
        alert("No ha ingresado correctamente su opinion");
    }
}