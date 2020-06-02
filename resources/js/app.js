require("./bootstrap");

window.Vue = require("vue");
Vue.use(require('vue-moment'));

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "candidatos-index",
    require("./components/candidatos/index.vue").default
);
Vue.component(
    "candidatos-create",
    require("./components/candidatos/create.vue").default
);

Vue.component(
    "elecciones-index",
    require("./components/elecciones/index.vue").default
);
Vue.component(
    "elecciones-create",
    require("./components/elecciones/create.vue").default
);

Vue.component(
    "votacion-index",
    require("./components/votacion/index.vue").default
);
Vue.component(
    "votacion-create",
    require("./components/votacion/create.vue").default
);
Vue.component(
    "estadisticas-index",
    require("./components/estadisticas/index.vue").default
);


const app = new Vue({
    el: "#app"
});
