<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CarroCompra;
use App\Models\Tenant\Cliente;
use App\Models\Tenant\DetalleVentaProducto;
use App\Models\Tenant\Producto;
use App\Models\Tenant\VentasProducto;

class CompraController extends Controller
{
  public function misCompras()
  {
    $user = auth('cliente')->user()->id;
    $compras = VentasProducto::where('id_cliente', $user)->orderBy('created_at', 'desc')->paginate();
    return view("tenant.pages.ventas.mis-compras", compact('compras'));
  }
  public function realizarCompra(Request $request)
  {
    $formasPagos = PlantillaConfigController::obtenerMediosPago();
    $productos = $request['productos'];
    $esCarroCompras = isset($request['btnCarritoCompras']);
    return view(
      "tenant.pages.ventas.realizar-compra",
      compact(
        'formasPagos',
        'productos',
        'esCarroCompras'
      )
    );
  }

  public function ordenar(Request $request)
  {
    $cliente = $request['cliente'];
    $productosGuardar = json_decode($request['productos']);
    $productos = [];
    $total = 0;
    $venta = VentasProducto::create([
      'id_cliente' => $cliente['id'],
      'id_tipo_pago' => 1,
      'id_estado_pago' => 1,
      'id_estado_venta' => 1,
      'telefono' => $cliente['telefono'],
      'ciudad' => $cliente['ciudad'],
      'direccion' => $cliente['direccion'],
      'total' => 0
    ]);
    foreach($productosGuardar as $producto){
      $productoEnviar = Producto::find($producto->id);
      $productoEnviar->cantidad = $producto->cantidad;
      array_push($productos, $productoEnviar);

      DetalleVentaProducto::create([
        'id_producto' => $producto->id,
        'id_venta' => $venta->id,
        'precio' => $producto->precio,
        'cantidad' => $producto->cantidad
      ]);
      $total += ($producto->precio * $producto->cantidad);
    }
    $venta->update(['total' => $total]);
    if(isset($request['btnCarritoCompras'])){
      CarroCompra::where('id_cliente', $cliente['id'])->delete();
    }
    return view("tenant.pages.ventas.orden-realizada", compact('venta', 'productos', 'total'));
  }
}
