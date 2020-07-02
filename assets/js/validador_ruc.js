//https://es.stackoverflow.com/questions/42957/c%C3%B3mo-validar-un-ruc-de-per%C3%BA
function validarInput(input) {
    var ruc       = input.value.replace(/[-.,[\]()\s]+/g,""),
        resultado = document.getElementById("validador"),
        inputruc = document.getElementById("proveedor_ruc"),
        //existente = document.getElementById("validador2"),
        valido;
        
    //existente.innerHTML = "";
    //ESTA VACIO EL INPUTA RUC?
    if (ruc) {
        console.log("lleno");
        //Es entero?    
        if ((ruc = Number(ruc)) && ruc % 1 === 0
        && rucValido(ruc)) { // ⬅️ ⬅️ ⬅️ ⬅️ Acá se comprueba
        valido = "Válido";        
        resultado.classList.remove("invalid-feedback");
        inputruc.classList.remove("is-invalid");
        resultado.classList.add("valid-feedback");
        inputruc.classList.add("is-valid");
        
        //obtenerDatosSUNAT(ruc);
        } 
        else {
            valido = "No válido";
            resultado.classList.remove("valid-feedback");
            inputruc.classList.remove("is-valid");
            resultado.classList.add("invalid-feedback");
            inputruc.classList.add("is-invalid");
        }
        resultado.innerText = "RUC: " + ruc + " | Formato: " + valido;
    }
    else{
        console.log("vacio");
        resultado.innerText = "Ingrese Ruc";
    }
    

}

// Devuelve un booleano si es un RUC válido
// (deben ser 11 dígitos sin otro caracter en el medio)
function rucValido(ruc) {
    //11 dígitos y empieza en 10,15,16,17 o 20
    if (!(ruc >= 1e10 && ruc < 11e9
       || ruc >= 15e9 && ruc < 18e9
       || ruc >= 2e10 && ruc < 21e9))
        return false;
    
    for (var suma = -(ruc%10<2), i = 0; i<11; i++, ruc = ruc/10|0)
        suma += (ruc % 10) * (i % 7 + (i/7|0) + 1);
    return suma % 11 === 0;
    
}

//Buscar datos del RUC y si existe
/*
function obtenerDatosSUNAT(ruc) {
    //Init
    var url = "https://cors-anywhere.herokuapp.com/wmtechnology.org/Consultar-RUC/?modo=1&btnBuscar=Buscar&nruc=" + ruc,
        existente = document.getElementById("existente"),
        xhr = false;
    if (window.XMLHttpRequest) //Crear XHR
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject)
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    else return false;
    //handler para respuesta
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) { //200 OK
            var doc = document.implementation.createHTMLDocument()
                    .documentElement,
                res = "",
                txt, campos,
                ok = false;
                
            doc.innerHTML = xhr.responseText;
            //Sólo el texto de las clases que nos interesa
            campos = doc.querySelectorAll(".list-group-item");
            if (campos.length) {
                for (txt of campos)
                    res += txt.innerText + "\n";
                //eliminar blancos por demás
                res = res.replace(/^\s+\n*|(:) *\n| +$/gm,"$1");
                //buscar si está el texto "ACTIVO" en el estado
                ok = /^Estado: *ACTIVO *$/m.test(res);
            } else
                res = "RUC: " + ruc + "\nNo existe.";
                
            //mostrar el texto formateado
            if (ok)
                existente.classList.add("ok");
            else 
                existente.classList.remove("ok");
            existente.innerText = res;
        }
    } //falta verificar errores en conexión
    xhr.open("POST", url, true);
    xhr.send(null);
}*/