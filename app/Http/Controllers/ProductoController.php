<?php

namespace App\Http\Controllers;


use App\Producto;
use App\Proveedor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;

use Illuminate\Support\Facades\Validator;


use Input;
use Storage;

class ProductoController extends Controller
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
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        // load the view and pass the productos
        return view('productos.index',compact('productos','proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        return view('productos.create', compact('productos','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $productos = new Producto;
        $productos->description=$request->description;
        $productos->proveedor_id=$request->proveedor_id;
        $productos->price=$request->price;
        $productos->quantity=$request->quantity;
        $productos->save();

        // Hago una redirección a la vista principal con un mensaje
        return redirect('productos')->with('message',__('Satisfactorily Saved!'));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        $productos = Producto::find($id);

        $proveedores = DB::table('proveedores')->where('id', '=', $productos->proveedor_id )->get();

        $proveedor=$proveedores[0]->name;


        return view('productos.show', compact('productos','proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $productos = Producto::find($id);

        $proveedores = Proveedor::all();
        return view('productos.edit', compact('productos','proveedores'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $productos = Producto::find($id);
        $productos->description=$request->description;

        $productos->proveedor_id=$request->proveedor_id;

        $productos->price=$request->price;
        $productos->quantity=$request->quantity;
        $productos->update();

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', __('Successfully Edited!'));
        return redirect()->route('productos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       // $productos = Producto::find($id);
        // Elimino el registro de la tabla 'productos'
        Producto::destroy($id);

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', __('Successfully removed!'));
        return redirect()->route('productos');
    }
}
