var btnMax = document.getElementById("max");
var btnMin = document.getElementById("min");

btnMax.addEventListener("click", aumentar ,false);
btnMin.addEventListener("click", disminuir ,false);

function aumentar(){
    canAct = document.getElementById("cantidad").value;
    canAct++ ;
    document.getElementById("cantidad").value = canAct;

    if(canAct >= 0 ) {
        btnMin.disabled = false;
    }

}
function disminuir(){
    canAct = document.getElementById("cantidad").value;
    canAct-- ;
    if (canAct == 0 ) {
        btnMin.disabled = true;
    }else{
      document.getElementById("cantidad").value =canAct;
    }
}
