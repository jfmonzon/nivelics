@extends('layouts.app')

@section('content')
  <div class="page-content">
    <div class="row">
      @include('layouts.menu')
      <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">{{__("Home")}}</a></li>
            <li class="breadcrumb-item" ><a href="{{ route('productos.index') }}">{{__("Productos")}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__("Create")}}</li>
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
                        <div class="panel-title"><h2>{{__("Productos Create")}}</h2></div>
                      </div>

                      <div class="panel-body" id="error_gg">
                        @if(Session::has('message'))
                          <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                          </div>
                        @endif



                          @if (count($proveedores)==0)
                            <div>
                              {{__("No tiene proveedores")}}<br>
                              <a href="{{route("proveedores.create")}}" class="btn btn-danger" >{{__("Proveedores Create")}}</a>
                            </div>
                          @else
                            <form method="POST" action="{{ route('productos.store') }}" role="form" id="create_producto" >
                              <div class="row">
                                <div class="col-md-12">
                                  <section class="panel">
                                    <div class="panel-body">
                                      <div class="form-group row">
                                        <label class="col-md-3 col-form-label col-form-label-sm font-weight-bold text-md-right requerido" for="description">
                                          {{__('Descripción')}}
                                        </label>
                                        <div class="col-md-8">
                                          <input class="form-control form-control-sm @error('description') is-invalid @enderror" id="description"  name="description" placeholder="{{__('description')}}" type="text" />
                                          @error('description')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
                                        </div>

                                      </div>

                                      <div class="form-group row">
                                        <label class="col-md-3 col-form-label col-form-label-sm font-weight-bold text-md-right requerido" for="proveedor_id">
                                          {{__('Proveedor')}}
                                        </label>
                                        <div class="col-md-8">
                                          <select class="form-control form-control-sm @error('proveedor_id') is-invalid @enderror" id="proveedor_id"  name="proveedor_id"  >
                                            <option value >Seleccione un proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                              <option value="{{$proveedor->id}}">
                                                {{$proveedor->name}}
                                              </option>
                                            @endforeach
                                            @error('proveedor_id')
                                              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                                            @enderror
                                          </select>
                                        </div>

                                      </div>
                                      <div class="form-group row">
                                        <label class="col-md-3 col-form-label col-form-label-sm font-weight-bold text-md-right requerido" for="price">
                                          {{__('Precio Unitario')}}
                                        </label>
                                        <div class="col-md-8">
                                          <input class="form-control numeros form-control-sm @error('price') is-invalid @enderror" id="price"  name="price" placeholder="{{__('price')}}" type="text" />
                                          @error('price')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{$message}}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-md-3 col-form-label col-form-label-sm font-weight-bold text-md-right requerido" for="quantity">
                                          {{__('Cantidad')}}
                                        </label>
                                        <div class="col-md-8">
                                          <input class="form-control numeros form-control-sm @error('quantity') is-invalid @enderror" id="quantity"  name="quantity" placeholder="{{__('quantity')}}" type="text" />
                                          @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{$message}}</strong>
                                            </span>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <button type="submit" class="btn btn-info">{{__('Save')}}</button>
                                        <input type="reset" class="btn btn-warning">
                                      </div>
                                    </div>
                                  </section>
                                </div>
                              </div>
                              @csrf
                            </form>

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
@section('valida')
<script src="{{asset('js/producto.js')}}" type="text/javascript"></script>
@endsection



