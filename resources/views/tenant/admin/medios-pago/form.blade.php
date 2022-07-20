<div class="box box-info padding-1">
  <div class="box-body">

    <div class="form-group">
      {{ Form::label('nombre') }}
      {{ Form::text('nombre', $mediosPago->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
      {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <!-- File para el logo de la plantilla -->
    <div class="form-group" style="width: 25%;">
      <label for="input-logo">Logo del medio de pago:</label>
      <div class="card img-logo">
        <input type="file" name="logo" class="input-img-logo" id="input-logo" />
        <img id="img-logo" src="{{global_asset($mediosPago->logo ?? 'img/big-deal/pets/menu-banner/1.png')}}" />
        <div class="icon-wrapper">
          <i class="fa fa-upload fa-5x"></i>
        </div>
      </div>
      {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      {{ Form::label('número de cuenta') }}
      {{ Form::text('cuenta', $mediosPago->cuenta, ['class' => 'form-control' . ($errors->has('cuenta') ? ' is-invalid' : ''), 'placeholder' => 'xxxx xxxx xxxx xxxx']) }}
      {!! $errors->first('cuenta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
      <label for="tipo_cuenta">Tipo de cuenta</label>
      <select name="tipo_cuenta" id="tipo_cuenta" class="form-control select2">
        <option value="N/A">N/A</option>
        <option value="AHORROS">AHORROS</option>
        <option value="CORRIENTE">CORRIENTE</option>
      </select>
    </div>
    <div class="form-group">
      {{ Form::label('habilitado') }}
      <div class="form-switch">
        {{ Form::checkbox('habilitado', $mediosPago->habilitado, $mediosPago->habilitado, ['class' => 'form-control form-check-input' . ($errors->has('habilitado') ? ' is-invalid' : ''), 'placeholder' => 'habilitado']) }}
      </div>
      {!! $errors->first('habilitado', '<div class="invalid-feedback">:message</div>') !!}
    </div>

  </div>
  <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>