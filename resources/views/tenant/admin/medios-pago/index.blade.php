@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"> x </span>
                </button>
              </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">WOMPI</label>
                  <input type="text" class="form-control" id="wompikey" aria-describedby="emailHelp" placeholder="inserte su llave publica">
                  <small id="emailHelp" class="form-text text-muted"> Dirijase para su mienta wompi y copie su llave publica</small>
                </div>
                <button type="submit" class="btn btn-primary" onclick="wompi_key_check()"> comprobar llave </button>

                <div class="form-group">
                  <label for="exampleInputEmail1">pay</label>
                  <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary" >comprobar llave </button>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function wompi_key_check() {
        const url = 'https://production.wompi.co/v1/merchants/';
        var wompikey = document.getElementById("wompikey").value;
        var urlcomplete = url + wompikey;
        var res;

        fetch(urlcomplete)
         	.then(response => response.json())
        	.then(response =>{
             if (response.hasOwnProperty("data")){
                console.log("tu llave es valida");
             }else if(response.hasOwnProperty("error")){
                console.log("tu llave es invalida");

             }
            }
            )
         	.catch(err => console.error(err));

    }
</script>
@endsection
