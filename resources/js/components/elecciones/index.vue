<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Elecciones</h4>
                            <p class="card-category">
                                Aquí puedes administrar los elecciones
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a
                                        href="elecciones/create"
                                        class="btn btn-sm btn-primary"
                                        >Agregar elección</a
                                    >
                                </div>
                            </div>
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
                                                    class="btn btn-success btn-link"
                                                    href=""
                                                    data-original-title=""
                                                    title=""
                                                >
                                                    <i class="material-icons"
                                                        >edit</i
                                                    >
                                                    <div
                                                        class="ripple-container"
                                                    ></div>
                                                </a>
                                                <button
                                                    type="button"
                                                    class="btn btn-danger btn-link"
                                                    data-original-title=""
                                                    title=""
                                                    onclick=""
                                                >
                                                    <i class="material-icons"
                                                        >close</i
                                                    >
                                                    <div
                                                        class="ripple-container"
                                                    ></div>
                                                </button>
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
        }
    }
};
</script>
