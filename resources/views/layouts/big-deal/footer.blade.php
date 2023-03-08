<?php

use App\Models\Tenant\Categoria;
use App\Models\Tenant\Producto;

  $catDestacadas = Categoria::where('destacada', true)->limit(5)->get();
  if(count($catDestacadas) > 0){
    $pCat = str_replace(' ', '_', $catDestacadas[0]->categoria);
  }
  $catsProds = array();
  foreach($catDestacadas as $catDestacada){
    $catsProds[$catDestacada->categoria] = Producto::where('id_categoria', $catDestacada->id)->limit(10)->get();
  }
?>

<!-- footer start -->
@if($tenant->whatsapp != null)
 <a href="https://api.whatsapp.com/send?phone={{ $tenant->whatsapp }}" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>

@endif
<footer>
  <div class="footer1 ">
    <div class="container">
        <div class="row-cols-1 ">
          <div class="footer-main">
            <div class="col-md-3 mx-auto">
              <div class="footer-title mobile-title">
                <h5>acerca</h5>
              </div>
              <div class="footer-contant">
                <div class="footer-logo">
                  <a href="">
                    <img src="{{ global_asset($tenant->logo) }}" class="img-fluid" alt="logo">
                  </a>
                </div>

                <p>{{ $tenant->descripcion }}</p>
                <ul class="sosiyal">
                  @if($tenant->facebook != null)
                  <li><a href="{{ $tenant->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  @endif
                  @if($tenant->twitter != null)
                  <li><a href="{{ $tenant->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  @endif
                  @if($tenant->instagram != null)
                  <li><a href="{{ $tenant->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  @endif
                  @if($tenant->youtube != null)
                  <li><a href="{{ $tenant->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="col-md-3 mx-auto">
                <div class="footer-contant">
                    <ul class="list-group list-group-flush" style="align-items: center">
                        @foreach($catDestacadas as $categoria)
                            @php
                                $nomCat = str_replace(' ', '_', $categoria->categoria)
                            @endphp
                                <li class="{{ $nomCat == $pCat ? 'current' : '' }}">
                                    <a href="{{url('categorias/'.$categoria->categoria)}}">{{ $categoria->categoria }}</a>
                                </li>
                        @endforeach
                    </ul>
                  <br>
                </div>
              </div>
            <div class="col-md-3 mx-auto">

              <div class="col-md-3 mx-auto">
                <div class="footer-title">
                  <h5>contactanos</h5>
                </div>
                <div class="footer-contant">
                  <ul class="contact-list">
                    @if($tenant->direccion != null)
                    <li><i class="fa fa-map-marker"></i>dirección: <span>{{ $tenant->direccion }}</span></li>
                    @endif
                    @if($tenant->telefono != null)
                    <li><i class="fa fa-phone"></i>teléfono: <span>{{ $tenant->telefono }}</span></li>
                    @endif
                    @if($tenant->correo != null)
                    <li><i class="fa fa-envelope-o"></i>correo: <span>{{ $tenant->correo }}</span></li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="subfooter footer-border">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="footer-left">
            </div>
            <p>DESDE 2017 HASTA EL 2022 COPY RIGHT BY SU SITIO WEB YA</p>
          </div>
          <div class="col-md-6">
            <div class="footer-right">
              <ul class="payment">
                @if (isset($mediosPagos) && $mediosPagos[0]['habilitado'] == 1 )
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/amercan-express.svg') }}" height="30px">
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/boton-bancolombia.svg') }}" height="30px">
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/cash.svg') }}" height="30px">
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/mastercard.svg') }}" height="30px" >
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/nequi.svg') }}" height="30px">
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/pse.svg') }}" height="30px">
                    <embed type="image/svg+xml" src="{{ global_asset('images/logos/visa.svg') }}" height="30px">
                 @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>
<!-- footer end -->
