<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Agregar elección</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a
                                        href="/candidatos"
                                        class="btn btn-sm btn-primary"
                                        >Regresar al listado</a
                                    >
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label"
                                        >Descripción</label
                                    >
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Descripción"
                                                v-model="eleccion.descripcion"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label"
                                        >Fecha inicio</label
                                    >
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input
                                                class="form-control text-secondary"
                                                type="date"
                                                v-model="eleccion.fecha_inicio"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label"
                                        >Hora inicio</label
                                    >
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input
                                                class="form-control text-secondary"
                                                type="time"
                                                v-model="eleccion.hora_inicio"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label"
                                        >Fecha fin</label
                                    >
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input
                                                class="form-control text-secondary"
                                                type="date"
                                                v-model="eleccion.fecha_fin"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label"
                                        >Hora fin</label
                                    >
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input
                                                class="form-control text-secondary"
                                                type="time"
                                                v-model="eleccion.hora_fin"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <label class="col-sm-4 col-form-label"
                                        >Estatus</label
                                    >
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select
                                                id="cars"
                                                class="form-control text-secondary"
                                                v-model="eleccion.eleccion_id"
                                            >
                                                <option value="1"
                                                    >Activa</option
                                                >
                                                <option value="0"
                                                    >Inactiva</option
                                                >
                                            </select>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button
                                type="submit"
                                @click.prevent="create"
                                class="btn btn-primary"
                            >
                                Agregar elección
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import PictureInput from "vue-picture-input";
import swal from "sweetalert";
export default {
    components: {
        PictureInput
    },
    data() {
        return {
            eleccion: {}
        };
    },

    methods: {
        create() {
            axios
                .post(`/api/elecciones/create`, this.eleccion)
                .then(response => {
                    swal({
                        title: "Correcto",
                        text: "Se ha añadido la elección",
                        icon: "success",
                        button: "Aceptar"
                    }).then(result => {
                        location.href = "/elecciones";
                    });
                })
                .catch(error => {
                    console.log(error.message);
                });
        }
    }
};
</script>
