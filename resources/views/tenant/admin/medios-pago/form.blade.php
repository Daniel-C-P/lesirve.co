  <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none">
    <p id="textAlert"></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <input type="hidden" id="direccion" value="{{route('medios-pagos.update')}}">
  <input type="hidden" id="token" value="{{csrf_token()}}">

    <div class="form-group">
      <label for="exampleInputEmail1">WOMPI</label>
      <input type="text" class="form-control" id="wompikey" aria-describedby="emailHelp" placeholder="inserte su llave publica">
      <small id="emailHelp" class="form-text text-muted"> Dirijase para su cuenta de  wompi y copie su llave publica</small>
    </div>
    <button type="submit" class="btn btn-primary" id="btnWompy"> comprobar llave </button>

    <div class="form-group">
      <label for="exampleInputEmail1">pay</label>
      <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary" >comprobar llave </button>
