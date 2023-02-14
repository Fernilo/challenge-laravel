require('./bootstrap');

let element = document.getElementsByClassName("boton-eliminar");

for(let i = 0; i < element.length; i++) {
    element[i].addEventListener("click", function() {
        let resultado = confirm("Ok?")
        if(resultado) {
            document.getElementById("form-"+i).submit();
        }
    })
}