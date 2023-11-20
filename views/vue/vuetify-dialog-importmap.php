<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vuetify@3.4.1/dist/vuetify.min.css"/>

<div class="site-index">
    <div id="app">
        <v-container>
            <my-dialog-importmap></my-dialog-importmap>        
        </v-container>
    </div>
</div>

<script type="importmap">
    {
        "imports": {
            "vue": "https://unpkg.com/vue@3/dist/vue.esm-browser.js",
            "vuetify": "https://unpkg.com/vuetify@3.4.1/dist/vuetify.esm.js"
        }
    }
</script>

<script type="module">
  import { createApp } from 'vue'
  import { createVuetify } from 'vuetify'
  import MyDialogImportmap from "/vue-modules/MyDialogImportmap.js"

  const vuetify = createVuetify()

    const app = createApp({
        data: () => ({
            dialog: false, 
        }),
        components: {
            MyDialogImportmap,
        },
    });
    
    app.use(vuetify).mount('#app')
</script>