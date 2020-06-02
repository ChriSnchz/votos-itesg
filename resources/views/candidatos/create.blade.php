@extends('layouts.app', ['activePage' => 'candidatos', 'titlePage' => __('Administración candidatos')])

@section('content')
  <div class="content" id="app" >
    <div class="container-fluid">
      <div  class="content">
        <candidatos-create></candidatos-create>
      </div>
    </div>
  </div>
@endsection