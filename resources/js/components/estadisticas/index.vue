<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Estadisticas</h4>
                            <p class="card-category">
                                Aquí puedes ver los resultados de las elecciones.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Eleccion</th>
                                        <th>Nombre</th>
                                        <th>Votos</th>
                                    </thead>
                                    <tbody>
                                        <tr v-for="candidato in candidatos">
                                            <td>
                                              {{
                                              candidato.eleccion.descripcion
                                              }}
                                            </td>
                                            <td>
                                              {{ candidato.nombre }}
                                              {{ candidato.apellido_paterno }}
                                              {{ candidato.apellido_materno }}
                                            </td>
                                            <td>
                                              {{candidato.total}}
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            candidatos: {}
        };
    },
    mounted() {
        this.getEleccion();
    },
    methods: {
        getEleccion() {
            this.candidatos = {};
            axios.get(`/api/elecciones/getEstadistica`).then(response => {
                this.candidatos = response.data;
            });
        }
    }
};
</script>
