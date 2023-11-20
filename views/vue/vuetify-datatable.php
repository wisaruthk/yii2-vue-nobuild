<?php

/* @var $this yii\web\View */

$this->title = 'PDPA - ROPA : Record of Activities';
?>
<?php
    $apps = @Yii::$app->params['app_shortcuts'];
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.css"/>

<div class="site-index">
    <div id="app">
        <v-container>
            <data-table></data-table>
        </v-container>
        <v-container>
            <v-btn append-icon="$vuetify">Button</v-btn>
        </v-container>
    </div>
</div>




<script type="module">
    const { createApp } = Vue
    const { createVuetify } = Vuetify
    const { VuetifyDateAdapter } = Vuetify
    import DataTable from '/vue-modules/DataTable.js'
    //import FakeAPI from '/vue-modules/FakeAPI.js'
    

    const vuetify = createVuetify({
        theme:{
            defaultTheme:'dark',
        }
    })

    const app = createApp({
        data: () => ({
            serverItems: [], 
        }),
        components: {
            DataTable,
        },
    })
    
    app.use(vuetify).mount('#app')
</script>

