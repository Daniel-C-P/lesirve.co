
var btnWompy = document.getElementById("btnWompy");
var flexSwitchCheck = document.getElementById("flexSwitchCheck");
var alert = document.getElementById("alert");
var textAlert = document.getElementById("textAlert");

var dir = document.getElementById("direccion").value;
var token = document.getElementById("token").value;

flexSwitchCheck.addEventListener("click",activar_desactivar,false);
btnWompy.addEventListener("click",wompi_key_check,false)

function activar_desactivar(){
    var wompikey = document.getElementById("wompikey").value;
    console.log(Boolean(wompikey));
    var wompikeypv = document.getElementById("wompikeypv").value;
    console.log(flexSwitchCheck.checked);
    var keys = {
        chec : flexSwitchCheck.checked ? 1 : 0,
    };
    console.log(keys);
    cargardatos(keys);
}

function wompi_key_check() {
    const url = 'https://production.wompi.co/v1/merchants/';
    var wompikey = document.getElementById("wompikey").value;
    var wompikeypv = document.getElementById("wompikeypv").value;
    var urlcomplete = url + wompikey;
    var res

    fetch(urlcomplete)
        .then(response => response.json())
        .then(response =>{
         if (response.hasOwnProperty("data")){
            if (response.data.active) {
                var keys = {
                    pub: wompikey ? wompikey : '',
                    prv: wompikeypv ? wompikeypv : '' ,
                    chec: flexSwitchCheck.checked ?  1 : 0,
                };
                cargardatos(keys);
            }else{
                textAlert.innerHTML= "tu cuenta no esta activada";
            }
            alert.style.display = "block";
         }else if(response.hasOwnProperty("error")){
            console.log("tu llave es invalida");
            textAlert.innerHTML= "su llave es invalida";
            alert.style.display = "block";
         }
        }
        )
         .catch(err => console.error(err));
}



function cargardatos(keys){
    const options = {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(keys),
    };
    fetch(dir,options)
        .then(response => response.json())
        .then(response =>{
          textAlert.innerHTML= "su llave es valida";
          console.log(response);
        }
        )
         .catch(err => console.error(err));
}
