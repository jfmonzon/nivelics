
@extends('layouts.app')

@section('content')
  <div class="page-content">
    <div class="row">
      @include('layouts.menu')
      <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">{{__("Home")}}</a></li>
            <li class="breadcrumb-item" ><a href="{{ route('proveedores.index') }}">{{__("Proveedores")}}</a></li>
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
                        <div class="panel-title"><h2>{{__("Proveedores Show")}}</h2></div>
                      </div>
                      <div class="panel-body">
                        @if(Session::has('message'))
                          <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                          </div>
                        @endif
                        <div>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <td>{{__("name")}}</td><td class="v-align-middle">{{$proveedores->name}}</td>



                            </thead>
                        </table>
                        <a class="btn btn-small btn-primary" href="{{ URL::to('proveedores/') }}">{{__('Proveedores')}}</a>
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




