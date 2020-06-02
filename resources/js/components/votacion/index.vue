<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Votación</h4>
                            <p class="card-category">
                                Aquí puedes emitir tu voto
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Descripción</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>
                                        <th>Estatus</th>
                                        <th class="text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                        <tr v-for="eleccion in elecciones">
                                            <td>
                                                {{ eleccion.descripcion }}
                                            </td>
                                            <td>
                                                {{ eleccion.fecha_inicio }}
                                            </td>
                                            <td>
                                                {{ eleccion.fecha_fin }}
                                            </td>
                                            <td v-if="(eleccion.estatus = 1)">
                                                Activa
                                            </td>
                                            <td
                                                v-else-if="
                                                    (eleccion.estatus = 0)
                                                "
                                            >
                                                Inactiva
                                            </td>
                                            <td class="td-actions text-right">
                                                <a
                                                    rel="tooltip"
                                                    class="btn btn-info btn-link"
                                                    @click="votar(eleccion.id)"
                                                >
                                                    <i class="material-icons"
                                                        >how_to_vote</i
                                                    >
                                                    <div
                                                        class="ripple-container"
                                                    ></div>
                                                </a>
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
            elecciones: {}
        };
    },
    mounted() {
        this.getEleccion();
    },
    methods: {
        getEleccion() {
            this.elecciones = {};
            axios.get(`/api/elecciones/getElecciones`).then(response => {
                this.elecciones = response.data;
            });
        },
        votar(id) {
            location.href = `/votacion/${id}/votar`;
        }
    }
};
</script>
