function Register()
{
        sameEmail();
        samePassword();
        localStorage.setItem("email", document.getElementById("Email").value);
        localStorage.setItem("pass", document.getElementById("Contraseña").value);
        localStorage.setItem("nombre", document.getElementById("Nombre").value);
        localStorage.setItem("apellido", document.getElementById("Apellido").value);
        localStorage.setItem("fechanac", document.getElementById("FechaNac").value);
        document.getElementById("formRegister").submit();
        window.location.replace("success.html");

}
//alert cuando no son iguales los emails
function sameEmail() {
    var email = document.getElementById("Email").value;
    var email2 = document.getElementById("Email2").value;
    if (email > email2) {
        alert("El Correo electronico no es igual por favor verifiquelo");
    }
}
//alert cuando no son iguales las password
function samePassword() {
    var email = document.getElementById("Contraseña").value;
    var email2 = document.getElementById("Contraseña2").value;
    if (email > email2) {
        alert("Las contraseñas no son iguales");
    }
}
// calculo de edad
function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var dif = hoy.getMonth() - cumpleanos.getMonth();
    if (dif < 0 || (dif === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    return edad;
}

//voy llenando mi li con mis datos
function readDataRegister() {
    var ul = document.getElementById("listData");
    for (var i = 0; i < localStorage.length; i++){
        var li = document.createElement("li");
        li.appendChild(document.createTextNode(localStorage.getItem(localStorage.key(i))));
        ul.appendChild(li);
    }

    var fechNac = new Date(localStorage.getItem("fechanac"));
    var edad = calcularEdad(fechNac);
    liEdad = document.createElement("li");
    liEdad.appendChild(document.createTextNode("Edad: " + edad));
    ul.appendChild(liEdad);

    setTimeout(function() {
        localStorage.clear();
        window.location.replace("../index.html");
    }, 6000);
  }
