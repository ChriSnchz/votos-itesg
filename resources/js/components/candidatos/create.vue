<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form method="post">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Agregar candidato</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="/candidatos" class="btn btn-sm btn-primary">Regresar al listado</a>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-7">
                    <div class="row">
                      <label class="col-sm-6 col-form-label">Nombre</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Nombre"
                            v-model="
                                                            candidato.nombre
                                                        "
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-6 col-form-label">Apellido paterno</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Apellido paterno"
                            v-model="
                                                            candidato.apellido_paterno
                                                        "
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-6 col-form-label">Apellido materno</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Apellido materno"
                            v-model="
                                                            candidato.apellido_materno
                                                        "
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-6 col-form-label">Fecha nacimiento</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input
                            class="form-control text-secondary"
                            type="date"
                            placeholder="Fecha nacimiento"
                            v-model="
                                                            candidato.fecha_nacimiento
                                                        "
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-6 col-form-label">Elección a participar</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <select
                            id="cars"
                            class="form-control text-secondary"
                            v-model="
                                                            candidato.eleccion_id
                                                        "
                          >
                              <option v-for="eleccion in elecciones" :value="eleccion.id">{{eleccion.descripcion}}</option>
        
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-6 col-form-label">Propuestas</label>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <textarea
                            class="form-control"
                            required="true"
                            v-model="
                                                            candidato.propuestas
                                                        "
                            id="w3mission"
                            rows="4"
                            cols="50"
                          ></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="hello">
                      <picture-input
                        ref="pictureInput"
                        @change="onChange"
                        width="250"
                        height="250"
                        margin="16"
                        accept="image/jpeg"
                        size="10"
                        buttonClass="btn"
                        :customStrings="{
                                                    upload: '<h1>Bummer!</h1>',
                                                    drag:
                                                        'Selecciona una imagen para el candidato'
                                                }"
                      ></picture-input>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button
                type="submit"
                @click.prevent="create"
                class="btn btn-primary"
              >Agregar candidato</button>
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
      candidato: {},
      elecciones:{}
    };
  },
  mounted() {
        this.getEleccion();
  },
  methods: {
    onChange(image) {
      if (image) {
        this.image = image;
      }
    },
    getEleccion() {
            this.elecciones = {};
            axios.get(`/api/elecciones/getElecciones`).then(response => {
                this.elecciones = response.data;
            });
    },
    create() {
      var formData = new FormData();
      var imagefile = this.image;
      console.log(imagefile);
      formData.append("image", imagefile);
      formData.append("nombre", this.candidato.nombre);
      formData.append("apellido_paterno", this.candidato.apellido_paterno);
      formData.append("apellido_materno", this.candidato.apellido_materno);
      formData.append("fecha_nacimiento", this.candidato.fecha_nacimiento);
      formData.append("propuestas", this.candidato.propuestas);
      formData.append("eleccion_id", this.candidato.eleccion_id);
      axios
        .post("/api/candidatos/create", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          swal({
            title: "Correcto",
            text: "Se ha añadido al candidato",
            icon: "success",
            button: "Aceptar"
          }).then(result => {
            location.href = "/candidatos";
          });
        })
        .catch(error => {
          console.log(error.message);
        });
    }
  }
};
</script>
