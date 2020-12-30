<?php

namespace App\Http\Controllers;


use App\Proveedor;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProveedorRequest;

use Illuminate\Support\Facades\Validator;

use DB;
use Illuminate\Support\Facades\Redirect;
use Input;
use Storage;

class ProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();

        // load the view and pass the proveedores
        return view('proveedores.index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProveedorRequest $request)
    {
        $proveedores = new Proveedor;
        $validated = $request->validated();
    // Recibo todos los datos del formulario de la vista 'crear.blade.php'
        $proveedores->name = $request->name;




        // Inserto todos los datos en mi tabla 'proveedores'
        $proveedores->save();

        // Hago una redirección a la vista principal con un mensaje
        return redirect('proveedores')->with('message',__('Satisfactorily Saved!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $proveedores = Proveedor::find($id);

        // show the view and pass the proveedor to it
        return view('proveedores.show', compact('proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $proveedores = Proveedor::find($id);
        return view('proveedores.edit',compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProveedorRequest $request, $id)
    {
        $proveedores = Proveedor::find($id);
        $proveedores->update($request->all());

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', __('Successfully Edited!'));
        return Redirect::to('Proveedor');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       // $proveedores = Proveedor::find($id);
        // Elimino el registro de la tabla 'proveedores'
        Proveedor::destroy($id);

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', __('Successfully removed!'));
        return Redirect::to('Proveedor');
    }
}
