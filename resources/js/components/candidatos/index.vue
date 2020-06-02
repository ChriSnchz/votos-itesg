<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Candidatos</h4>
                            <p class="card-category">
                                Aquí puedes administrar los candidatos
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a
                                        href="candidatos/create"
                                        class="btn btn-sm btn-primary"
                                        >Agregar candidato</a
                                    >
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Nombre</th>
                                        <th>Fecha nacimiento</th>
                                        <th>Tipo elección</th>
                                        <th class="text-right">Acciones</th>
                                    </thead>
                                    <tbody>
                                        <tr v-for="candidato in candidatos">
                                            <td>
                                                {{ candidato.nombre }}
                                                {{ candidato.apellido_paterno }}
                                                {{ candidato.apellido_materno }}
                                            </td>
                                            <td>
                                                {{
                                                    candidato.fecha_nacimiento
                                                        | moment("L")
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    candidato.eleccion
                                                        .descripcion
                                                }}
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
            candidatos: {}
        };
    },
    mounted() {
        this.getEleccion();
    },
    methods: {
        getEleccion() {
            this.candidatos = {};
            axios.get(`/api/candidatos/getCandidatos`).then(response => {
                this.candidatos = response.data;
            });
        }
    }
};
</script>
