
var btnWompy = document.getElementById("btnWompy")
var alert = document.getElementById("alert");
var textAlert = document.getElementById("textAlert");

var dir = document.getElementById("direccion").value;
console.log(dir);
var token = document.getElementById("token").value;
console.log(token);


btnWompy.addEventListener("click",wompi_key_check,false)

function wompi_key_check() {
    const url = 'https://production.wompi.co/v1/merchants/';
    var wompikey = document.getElementById("wompikey").value;
    var urlcomplete = url + wompikey;
    var res;

    fetch(urlcomplete)
         .then(response => response.json())
        .then(response =>{
         if (response.hasOwnProperty("data")){
            cargardatos(wompikey);
            console.log("tu llave es valida");
            textAlert.innerHTML= "su llave es valida";
            alert.style.display = "block";
         }else if(response.hasOwnProperty("error")){
            console.log("tu llave es invalida");
         }
        }
        )
         .catch(err => console.error(err));
}


function cargardatos(wompikey){
    const options = {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(wompikey),
    };
    fetch(dir,options)
        .then(response => response.json())
        .then(response =>{
         console.log(response);
        }
        )
         .catch(err => console.error(err));
}
