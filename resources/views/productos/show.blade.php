
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
            <li class="breadcrumb-item active" aria-current="page">{{__("show")}}</li>
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
                        <div class="panel-title"><h2>{{__("Productoss Show")}}</h2></div>
                      </div>
                      <div class="panel-body">

                        <div>
                          <table class="table table-striped table-bordered table-hover">
                            <tr>
                              <td>{{__("description")}}</td><td class="v-align-middle">{{$productos->description}}</td>
                            </tr>
                            <tr>
                              <td>{{__('price')}}</td><td class="v-align-middle">{{$productos->price}}</td>
                            </tr>
                            <tr>
                              <td>{{__('quantity')}}</td><td class="v-align-middle">{{$productos->quantity}}</td>
                            </tr>

                            <tr>
                              <td>{{__('proveedor')}}</td><td class="v-align-middle">{{$proveedor}}</td>
                            </tr>

                        </table>
                        <a class="btn btn-small btn-primary" href="{{ URL::to('productos/') }}">{{__('Products')}}</a>
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




