
@extends('layouts.app')

@section('content')
  <div class="page-content">
    <div class="row">
      @include('layouts.menu')
      <div class="col-md-10">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin/dashboard') }}">{{__("Home")}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__("Proveedores")}}</li>
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
                        <div class="panel-title"><h2>{{__("Proveedores")}}</h2></div>
                      </div>
                      <div class="panel-body">
                        @if(Session::has('message'))
                          <div class="alert alert-primary" role="alert">
                            {{ Session::get('message') }}
                          </div>
                        @endif

                          <div class="col-md-12 ">
                            <a href="{{ route('proveedores.create') }}" class="btn btn-success mt-4 ml-3 float-right">{{__('Create')}} {{__('Proveedores')}}</a>
                          </div>

                          <br/><br/><br/>
                        @if (count($proveedores)==0)
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{__('There are no Proveedores to display')}}</th>
                                    </tr>
                                </thead>
                            </table>
                        @else
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                      <th>{{__('name')}}</th>

                                      <th>{{__('actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedores as $proveedor)
                                      <tr>
                                        <td class="v-align-middle">{{$proveedor->id}}</td>
                                          <td class="v-align-middle">{{$proveedor->name}}</td>


                                          <td class="v-align-middle">

                                            <a class="btn btn-small btn-primary" href="{{ URL::to('proveedores/' . $proveedor->id ) }}">{{__('show')}}</a>
                                            <a class="btn btn-small btn-warning" href="{{ route('proveedores.edit', $proveedor->id) }}">{{__('edit')}}</a>
                                            <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#Modal{{$proveedor->id}}">
                                              <span class="glyphspancon glyphicon-erase">Borrar</span>
                                            </button>

                                            <div class="modal fade" id="Modal{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content border-info">
                                                      <div class="modal-header bg-info m-0 p-2">
                                                          <h6 class="modal-title font-weight-bold" id="ModalLabel">
                                                              Proveedor: {{$proveedor->name}}
                                                          </h6>
                                                      </div>
                                                      <div class="modal-body font-weight-bold">{{__('Quiere eliminar este proveedor...?')}}</div>
                                                      <div class="modal-footer">
                                                          <form action="{{route('proveedores.destroy',['proveedore' => $proveedor->id])}}" id="delete_proveedor{{$proveedor->id}}" method="POST" name="delete_proveedor{{$proveedor->id}}">
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







