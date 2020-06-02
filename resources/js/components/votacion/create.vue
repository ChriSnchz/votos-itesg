<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                Elección: {{ eleccion.descripcion }}
                            </h4>
                            <p class="card-category">
                                Inicia
                                {{ eleccion.fecha_inicio | moment("DD-MM-Y") }}
                                {{ eleccion.fecha_inicio | moment("LT") }}
                                , finaliza
                                {{ eleccion.fecha_fin | moment("DD-MM-Y") }}
                                {{ eleccion.fecha_fin | moment("LT") }}
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div v-for="candidato in candidatos">
                                        <div class="col-md-6">
                                            <div
                                                class="card"
                                                style="width: 18rem;"
                                            >
                                                <img
                                                    class="card-img-top"
                                                    :src="candidato.imagen_path"
                                                    alt="Card image cap"
                                                    width="100px"
                                                    height="200px"
                                                />
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <b
                                                            >{{
                                                                candidato.nombre
                                                            }}
                                                            {{
                                                                candidato.apellido_paterno
                                                            }}
                                                            {{
                                                                candidato.apellido_materno
                                                            }}</b
                                                        >
                                                    </h5>
                                                    <p
                                                        class="card-text text-justify"
                                                    >
                                                        {{
                                                            candidato.propuestas
                                                        }}
                                                    </p>
                                                    <a
                                                        href="#"
                                                        class="btn btn-primary"
                                                        @click.prevent="
                                                            saveVoto(candidato)
                                                        "
                                                        >Votar</a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";
export default {
    data() {
        return {
            candidatos: [],
            eleccion: {}
        };
    },
    mounted() {
        this.getEleccion();
    },
    methods: {
        getEleccion() {
            let str = window.location.pathname;
            let res = str.split("/");
            var i;
            axios.get(`/api/elecciones/${res[2]}`).then(response => {
                if (!response.data) {
                    swal({
                        title: "Error",
                        text: "La elección solicitada no existe",
                        icon: "error",
                        button: "Aceptar"
                    }).then(result => {
                        location.href = "/votacion";
                    });
                } else {
                    this.eleccion = response.data;
                    this.candidatos = this.eleccion.candidatos;
                    /*for(i=0;i< this.candidatos.length;i++){
                       this.candidatos[i].votos.votos_count=this.candidatos[i].votos.length;
                    }*/

                    if (this.candidatos.length == 0) {
                        swal({
                            title: "Atención",
                            text:
                                "La elección solicitada no tiene candidatos registrados",
                            icon: "warning",
                            button: "Aceptar"
                        }).then(result => {
                            location.href = "/votacion";
                        });
                    }
                }
            });
        },
        saveVoto(candidato) {
            axios
                .post(`/api/votacion/create`, candidato)
                .then(response => {
                    swal({
                        title: "Correcto",
                        text: "Se ha capturado tu voto",
                        icon: "success",
                        button: "Aceptar"
                    }).then(result => {
                        location.href = "/votacion";
                    });
                })
                .catch(error => {
                    console.log(error.message);
                });
        }
    }
};
</script>
