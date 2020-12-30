
@extends('layouts.app')

@section('content')
  <div class="page-content">
    <div class="row">
      @include('layouts.menu')
      <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">{{__("Home")}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__("Productos")}}</li>
          </ol>
        </nav>

        <div class="row">

          <div class="col-md-12">

            <div class="content-box-large">

              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="content-box-large">
                      <div class="panel-heading">
                        <div class="panel-title"><h2>{{__("Productos")}}</h2></div>
                      </div>
                      <div class="panel-body">
                        @if(Session::has('message'))
                          <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                          </div>
                        @endif

                          <div class="col-md-12 ">
                            <a href="{{ route('productos.create') }}" class="btn btn-success mt-4 ml-3 float-right">{{__('Create')}} {{__('Productos')}}</a>
                          </div>

                          <br/><br/><br/>
                        @if (count($productos)==0)
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{__('There are no Productos to display')}}</th>
                                    </tr>
                                </thead>
                            </table>
                        @else

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                      <th>{{__('description')}}</th>
                                      <th>{{__('price')}}</th>
                                      <th>{{__('quantity')}}</th>

                                      <th>{{__('proveedor')}}</th>

                                      <th>{{__('actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @foreach($productos as $producto)

                                    @foreach ($proveedores as $proveedor)
                                      @if($producto->proveedor_id==$proveedor->id)
                                        @php
                                            $pro=$proveedor->name;
                                            continue;
                                        @endphp
                                      @endif
                                    @endforeach


                                    <tr>
                                        <td class="v-align-middle">{{$producto->description}}</td>
                                        <td class="v-align-middle">{{$producto->price}}</td>
                                        <td class="v-align-middle">{{$producto->quantity}}</td>

                                        <td class="v-align-middle">{{$pro}}</td>

                                        <td class="v-align-middle">

                                          <a class="btn btn-small btn-primary" href="{{ URL::to('productos/' . $producto->id ) }}">{{__('show')}}</a>
                                          <a class="btn btn-small btn-warning" href="{{ route('productos.edit', $producto->id) }}">{{__('edit')}}</a>
                                          <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#Modal{{$producto->id}}">
                                            <span class="glyphspancon glyphicon-erase">Borrar</span>
                                          </button>

                                          <div class="modal fade" id="Modal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content border-info">
                                                    <div class="modal-header bg-info m-0 p-2">
                                                        <h6 class="modal-title font-weight-bold" id="ModalLabel">
                                                            Producto: {{$producto->description}}
                                                        </h6>
                                                    </div>
                                                    <div class="modal-body font-weight-bold">{{__('Quiere eliminar este producto...?')}}</div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('productos.destroy',['producto' => $producto->id])}}" id="delete_producto{{$producto->id}}" method="POST" name="delete_producto{{$producto->id}}">
                                                            <button class="btn btn-sm btn-secondary" type="reset" data-dismiss="modal">NO</button>
                                                            <button class="btn btn-sm btn-danger" type="submit" id="delete" name="delete">SI</button>
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          @endif
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection







