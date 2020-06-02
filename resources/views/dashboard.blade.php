@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-users"></i>
              </div>
              <p class="card-category">Usuarios</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">link</i><a class="text-secondary" href="#"> Ir a usuarios</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-thumbs-o-up"></i>
              </div>
              <p class="card-category">Votos</p>
              <h3 class="card-title">245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">link</i><a class="text-secondary" href="#"> Ir a candidatos</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">how_to_vote</i>
              </div>
              <p class="card-category">Elecciones activas</p>
              <h3 class="card-title">245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">link</i><a class="text-secondary" href="#"> Ir a elecciones</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush