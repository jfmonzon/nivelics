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
                        <div class="panel-title"><h2>{{__("Proveedores Create")}}</h2></div>
                      </div>
                      <div class="panel-body">
                        @if(Session::has('message'))
                          <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                          </div>
                        @endif
                        <form method="POST" action="{{ route('proveedores.store') }}" role="form" id="create_proveedor">
                          <div class="row">
                            <div class="col-md-12">
                              <section class="panel">
                                <div class="panel-body">
                                  <div class="form-group row">
                                    <label class="col-md-3 col-form-label col-form-label-sm font-weight-bold text-md-right requerido" for="name">
                                      {{__('Name')}}
                                    </label>
                                      <div class="col-md-8">
                                        <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"  name="name" placeholder="{{__('name')}}" type="text" />
                                        @error('name')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
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
<script src="{{asset('js/proveedor.js')}}" type="text/javascript"></script>
@endsection



