@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Medios Pago') }}
            </span>

            <div class="float-right">
              <a href="{{ route('medios-pagos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                {{ __('Create New') }}
              </a>
            </div>
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="thead">
                <tr>
                  <th>No</th>

                  <th>Nombre</th>
                  <th>Logo</th>
                  <th>Habilitado</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mediosPagos as $mediosPago)
                <tr>
                  <td>{{ ++$i }}</td>

                  <td>{{ $mediosPago->nombre }}</td>
                  <td><img src="{{ global_asset($mediosPago->logo) }}" style="width: 50px;"></td>
                  <td>{{ $mediosPago->habilitado > 0 ? 'Si' : 'No' }}</td>

                  <td>
                    <form action="{{ route('medios-pagos.destroy',$mediosPago->id) }}" method="POST">
                      <a class="btn btn-sm btn-primary " href="{{ route('medios-pagos.show',$mediosPago->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                      <a class="btn btn-sm btn-success" href="{{ route('medios-pagos.edit',$mediosPago->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {!! $mediosPagos->links() !!}
    </div>
  </div>
</div>
@endsection