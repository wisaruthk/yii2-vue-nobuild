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
        <router-view></router-view>
    </v-container>
    <v-container>
      <v-data-table-server
        v-model:items-per-page="itemsPerPage"
        :headers="headers"
        :items-length="totalItems"
        :items="serverItems"
        :loading="loading"
        item-value="username"
        @update:options="loadItems"
      >
        <template v-slot:item.username="{ item, value }">
          {{ value }} <v-btn density="compact" icon="mdi-plus" @click="openUser(item)"></v-btn>
        </template>
        <template v-slot:item.email="{ value }">
          <v-chip>{{ value }}</v-chip>
        </template>
      </v-data-table-server>
    </v-container>
    <v-container>
      <v-btn append-icon="$vuetify">Button</v-btn>
      <v-btn append-icon="fa-solid fa-plus">DEMO</v-btn>
      <v-btn @click="saveUser">Save User</v-btn>
    </v-container>
    <v-container>
        <div class="text-center">
            <v-pagination
              v-model="page"
              :length="15"
              :total-visible="7"
            ></v-pagination>
          </div>
    </v-container>
    <v-container>
        <my-list :my_items="serverItems"></my-list>
    </v-container>
  </div>
</div>

<script type="module">
  const { createApp } = Vue;
  const { createVuetify } = Vuetify;
  const { VuetifyDateAdapter } = Vuetify;
  const { createRouter } = VueRouter;
  import MyList from '/vue-modules/MyList.js'
  //import FakeAPI from '/vue-modules/FakeAPI.js'

  const vuetify = createVuetify({
    theme: {
      defaultTheme: "light",
    },
  });

  // 1. Define route components.
    // These can be imported from other files
    const Home = { template: '<div>Home</div>' }
    const About = { template: '<div>About</div>' }

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


  const app = createApp({
    components: {
        MyList
    },
    data: () => ({
        page:1,
      itemsPerPage: 5,
      headers: [
        {
          title: "Username",
          align: "start",
          sortable: false,
          key: "username",
        },
        { title: "Email", key: "email", align: "end" },
        { title: "Code", key: "code", align: "end" },
        { title: "Fistname", key: "firstname", align: "end" },
      ],
      serverItems: [],
      loading: true,
      totalItems: 0,
    }),
    methods: {
      loadItems({ page, itemsPerPage, sortBy }) {
        this.loading = true;

        // Using Fetch API
        fetch("./get-users")
          .then((response) => {
            if (!response.ok) {
              throw new Error("HTTP error! Status: ${response.status}");
            }
            return response.json();
          })
          .then((data) => {
            console.log(data);
            this.serverItems = data.users;
            this.totalItems = data.totalItems;
          })
          .catch((error) => {
            console.error("Error fetching data:", error);
          })
          .finally((a) => {
            this.loading = false;
          });
      },
      openUser(item){
        console.log("open User", item)
        console.log(this.$router)
        this.$router.push('/about')
        //window.location.href = './ropa';
        
      },
      saveUser(){
        // POST METHOD
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        fetch("./save-user",{ 
            method:"POST",
            headers: {
                'Content-Type':'application/json',
                'X-CSRF-Token':csrfToken,
            },
            body: JSON.stringify({a:1,b:'Textual content'})
        })
        .then(response => {
            if (!response.ok) {
              throw new Error("HTTP error! Status: ${response.status}");
            }
            return response.json();
        }) 
        .then((data)=>{
            console.log(data);
        })
      }
    },
    
  });

  app.use(vuetify)
  .use(router)
  .mount("#app");
</script>

