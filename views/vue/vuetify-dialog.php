<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.css"/>

<div class="site-index">
    <div id="app">
        <v-container>
            <my-dialog></my-dialog>        
        </v-container>
    </div>
</div>


<script type="module">
  const { createApp } = Vue
  const { createVuetify } = Vuetify
  import MyDialog from "/vue-modules/MyDialog.js"

  const vuetify = createVuetify()

    const app = createApp({
        data: () => ({
            dialog: false, 
        }),
        components: {
            MyDialog,
        },
    });
    
    app.use(vuetify).mount('#app')
</script>