<template>
    <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Estadísticas</h4>
            <p class="card-category">  Aquí puedes visualizar las Estadísticas</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Descripción
                  </th>
                  <th>
                    Candidatos
                  </th>
                  <th>
                    Votos
                  </th>

                </thead>
                <tbody>
                  <tr>
                    <td>
                      Presidente
                    </td>
                    <td>
                      Karla Moreno<br>
                      Cristobal Sanchez
                    </td>
                    <td>
                      1<br>
                      2
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            elecciones: {}
        };
    },
    mounted() {
        this.getElecciones();
    },
    methods: {
        getElecciones() {
            var i,x;
            this.elecciones = {};
            axios.post(`/api/elecciones/getEstadistica`).then(response => {
                this.elecciones = response.data;
                this.candidatos = this.elecciones.candidatos;

            });
        }
    }
};
</script>
