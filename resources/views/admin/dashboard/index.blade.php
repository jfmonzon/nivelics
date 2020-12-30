
@extends('layouts.app')

@section('content')
<div class="page-content">
  <div class="row">
    @include('layouts.menu')
    <div class="col-md-10">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">{{__("Dashboard")}}</li>
        </ol>
      </nav>

      <div class="row">

        <div class="col-md-12">

          <div class="content-box-large">

            <div class="panel-body">

              <h1>{{__("Welcome to administrator")}}</h1>  

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

@endsection        
    
 