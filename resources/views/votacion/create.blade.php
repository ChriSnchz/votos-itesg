@extends('layouts.app', ['activePage' => 'votacion', 'titlePage' => __('Votación')])

@section('content')
  <div class="content" id="app" >
    <div class="container-fluid">
      <div  class="content">
        <votacion-create></votacion-create>
      </div>
    </div>
  </div>
@endsection