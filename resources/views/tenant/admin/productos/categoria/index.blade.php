@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('Categoria') }}
            </span>

            <div class="float-right">
              <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="thead">
                <tr>
                  <th>No</th>

                  <th>Categoria</th>
                  <th>Descripcion</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                  <td>{{ ++$i }}</td>

                  <td>{{ $categoria->categoria }}</td>
                  <td>{{ $categoria->descripcion }}</td>

                  <td>
                    <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST" class="form-delete">
                      <a class="btn btn-sm btn-success" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-pencil"></i> Editar</a>
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
      {!! $categorias->links() !!}
    </div>
  </div>
</div>
@stop