<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tenant\ProductoController;
use App\Models\Tenant\Categoria;
use App\Models\Tenant\Configuracione;
use App\Models\Tenant\MediosPago;
use App\Models\Tenant\Producto;
use App\Models\Tenant\Servicio;

class PlantillaConfigController extends Controller
{
  public function configDefecto()
  {
    
    $categorias = Categoria::paginate();
    $productos = $this->obtenerProductos();
    $listaProductos = array();
    foreach ($productos as $producto) {
      $categoria = $producto->categoria->categoria;
      $listaProductos[$categoria] = array();
    }
    foreach ($productos as $producto) {
      array_push($listaProductos[$producto->categoria->categoria], $producto);
    }
  
    return [
      'tenant' => PlantillaConfigController::obtenerConfiguracion(),
      'servicios' => $this->obtenerServicios(),
      'productos' => $productos,
      'mediosPago' => $this->obtenerMediosPago(),
      'productosNuevos' => ProductoController::obtenerProductosNuevos(),
      'servicio' => $this->obtenerServicios(),
    ];
  }

  public static function obtenerConfiguracion()
  {
    $config = Configuracione::first();
    return (object)[
      'id_plantilla' => $config->id_plantilla,
      'id' => explode('.', $_SERVER['HTTP_HOST'])[0],
      'logo' => $config->logo,
      'nombre_tienda' => $config->nombre_tienda,
      'descripcion' => $config->descripcion,
      'direccion' => $config->direccion,
      'telefono' => $config->telefono,
      'correo' => $config->correo,
      'banner1' => $config->imagen_banner_1,
      'banner2' => $config->imagen_banner_2,
      'banner3' => $config->imagen_banner_3,
      'titulo_banner_1' => $config->titulo_banner_1,
      'titulo_banner_2' => $config->titulo_banner_2,
      'titulo_banner_3' => $config->titulo_banner_3,
      'descripcion_banner_1' => $config->descripcion_banner_1,
      'descripcion_banner_2' => $config->descripcion_banner_2,
      'descripcion_banner_3' => $config->descripcion_banner_3,
      'facebook' => $config->facebook,
      'twitter' => $config->twitter,
      'whatsapp' => $config->whatsapp,
      'instagram' => $config->instagram,
      'youtube' => $config->youtube,
      'color_primario' => $config->color_p,
      'color_secundario' => $config->color_s,
    ];
  }

  public static function obtenerCategorias(){
    return Categoria::paginate();
  }

  public function obtenerServicios()
  {
    return Servicio::paginate();
  }

  public function obtenerProductos()
  {
    return Producto::paginate();
  }

  public static function obtenerMediosPago()
  {
    return MediosPago::where('habilitado', true)
      ->paginate();
  }

}
