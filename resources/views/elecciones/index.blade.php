@extends('layouts.app', ['activePage' => 'elecciones', 'titlePage' => __('Administración elecciones')])

@section('content')
  <div class="content" id="app" >
    <div class="container-fluid">
      <div  class="content">
        <elecciones-index></elecciones-index>
      </div>
    </div>
  </div>
@endsection