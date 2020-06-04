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
                                        <tr v-for="candidato in candidatos" :key="candidato.id">
                                            <td>
                                              {{candidato.eleccion}} ({{candidato.f_inicio | moment("D-M-Y")}} - {{candidato.f_fin | moment("D-M-Y")}})
                                            </td>
                                            <td>
                                              {{ candidato.nombre }}
                                              {{ candidato.apellido_paterno }}
                                              {{ candidato.apellido_materno }}
                                            </td>
                                            <td>
                                              {{candidato.votos}}
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
        this.getEstadistica();
    },
    methods: {
        getEstadistica() {
            this.candidatos = {};
            axios.post(`/api/elecciones/getEstadistica`).then(response => {
                this.candidatos = response.data;
            });
        }
    }
};
</script>