@extends('layouts.app', ['activePage' => 'votacion', 'titlePage' => __('Votación')])

@section('content')
  <div class="content" id="app" >
    <div class="container-fluid">
      <div  class="content">
        <votacion-index></votacion-index>
      </div>
    </div>
  </div>
@endsection