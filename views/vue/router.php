<?php

/* @var $this yii\web\View */

$this->title = 'PDPA - ROPA : Record of Activities'; ?>
<?php
    $apps = @Yii::$app->params['app_shortcuts']; ?>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@3.4.2/dist/vuetify.min.js"></script>
<script src="https://unpkg.com/vue-router@4.0.15/dist/vue-router.global.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/vuetify@3.4.2/dist/vuetify.min.css"
/>
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
/>

<div class="site-index">
  <div id="app">
    <v-container>
        <h1>Header</h1>
        <router-view></router-view>
    </v-container>
  </div>
</div>

<script type="module">
  const { createApp } = Vue;
  const { createVuetify } = Vuetify;
  const { VuetifyDateAdapter } = Vuetify;
  const { createRouter } = VueRouter;
  import Home from '/vue-modules/Home.js'
  import About from '/vue-modules/About.js'

  const vuetify = createVuetify({
    theme: {
      defaultTheme: "light",
    },
  });

  // 1. Define route components.
    // These can be imported from other files
    //const Home = { template: '<div>Home</div>' }
    //const About = { template: '<div>About</div>' }

    // 2. Define some routes
    // Each route should map to a component.
    // We'll talk about nested routes later.
    const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    ]

  const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: VueRouter.createWebHashHistory(),
    routes, // short for `routes: routes`
  });


  const app = createApp();

  app.use(vuetify)
  .use(router)
  .mount("#app");
</script>

