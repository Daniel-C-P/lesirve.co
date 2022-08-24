<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\MediosPago;
use App\Traits\Template;
use Illuminate\Http\Request;

/**
 * Class MediosPagoController
 * @package App\Http\Controllers
 */
class MediosPagoController extends Controller
{
  use Template;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $mediosPagos = MediosPago::paginate();

    return view('tenant.admin.medios-pago.index', compact('mediosPagos'))
      ->with('i', (request()->input('page', 1) - 1) * $mediosPagos->perPage());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($request)
  {

    dd($request->all());
    $mediosPago = new MediosPago();
    return ('hola');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $mediosPago = MediosPago::find($id);

    return view('tenant.admin.medios-pago.show', compact('mediosPago'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $mediosPago = MediosPago::find($id);

    return view('tenant.admin.medios-pago.edit', compact('mediosPago'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  MediosPago $mediosPago
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, MediosPago $mediosPago)
  {

  }return($request)

  /**
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    $mediosPago = MediosPago::find($id)->delete();

    return redirect()->route('medios-pagos.index')
      ->with('success', 'MediosPago deleted successfully');
  }
}
