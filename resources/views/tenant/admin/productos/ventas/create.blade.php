@extends('layouts.dashboard')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear nueva venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tenant.productos.ventas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('tenant.admin.productos.ventas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
