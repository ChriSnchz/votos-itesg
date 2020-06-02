@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Estadísticas')])

@section('content')
<div class="content" id="app" >
  <div class="container-fluid">
    <estadisticas-index></estadisticas-index>
  </div>
</div>
@endsection