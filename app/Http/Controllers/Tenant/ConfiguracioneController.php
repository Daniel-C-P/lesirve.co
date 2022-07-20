<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Cliente;
use App\Models\Tenant\Configuracione;
use App\Models\Tenant\Producto;
use Illuminate\Http\Request;
use App\Traits\Template;

/**
 * Class ConfiguracioneController
 * @package App\Http\Controllers
 */
class ConfiguracioneController extends Controller
{
  use Template;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $configuracion = Configuracione::first();
    $listaPlantillas = [
      (object)[
        'id' => 'big-deal',
        'imagen' => 'img/plantillas/pets.jpg',
        'nombre' => 'big-deal',
      ],
      (object)[
        'id' => 'mega-store',
        'imagen' => 'img/plantillas/mega-store.jpg',
        'nombre' => 'Mega Store',
      ],
      (object)[
        'id' => 'cosmetic',
        'imagen' => 'img/plantillas/cosmetic.jpg',
        'nombre' => 'Cosmetic',
      ],
    ];

    $total_imagenes = count(glob('img/plantillas/{*.jpg}', GLOB_BRACE));
    return view('tenant.admin.configuracion.index', compact('configuracion', 'total_imagenes', 'listaPlantillas'));
  }

  //Creamos una configuracion con los valores del tenant
  public function configDefecto()
  {
    //traemos el nombre del tenant
    $nombre_tienda = $this->traerNombre();
    //Iniciamos el objeto configuracion
    $newConfig = new Configuracione();
    $newConfig->nombre_tienda = $nombre_tienda;
    $newConfig->save();
    return $newConfig;
  }

  public function update(Request $request, Configuracione $conf)
  {

    $data = request()->except(['_token', '_method']);
    if(isset($data['imagen_banner_1'])){
      $data['imagen_banner_1'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_1');
    }
    if(isset($data['imagen_banner_2'])){
      $data['imagen_banner_2'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_2');
    }
    if(isset($data['imagen_banner_3'])){
      $data['imagen_banner_3'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'imagen_banner_3');
    }

    if(isset($data['logo'])){
      $data['logo'] = ConfiguracioneController::moveImage($request, $this->traerNombre(), 'logo');
    }

    $conf->query()->update($data);

    return redirect()->route('tenant.admin.configuracion')
      ->with('success', 'Se actualizó correctamente la configuración');
  }
}
