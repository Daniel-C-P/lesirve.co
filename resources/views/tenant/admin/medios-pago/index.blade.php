@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">

            @include('tenant.admin.medios-pago.form')

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ global_asset('js/tenant/admin/mediosdepago.js') }}"></script>
@endsection
