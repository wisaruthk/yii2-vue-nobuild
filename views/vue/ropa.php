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
    <form id="search">
        Search <input name="query" v-model="searchQuery">
    </form>
    <demo-grid
        :data="gridData"
        :columns="gridColumns"
        :filter-key="searchQuery">
    </demo-grid>
    </div>
</div>

<script type="module">
    const { createApp } = Vue
    const { createVuetify } = Vuetify
    import DemoGrid from '/vue-modules/Grid.js'

    const vuetify = createVuetify()
    
    const app = createApp({
        components: {
            DemoGrid
        },
        data: () => ({
            searchQuery: '',
            gridColumns: ['name','power'],
            gridData: [
                { name: 'Chuck Norris', power: Infinity },
                { name: 'Bruce Lee', power: 9000 },
                { name: 'Jackie Chan', power: 7000 },
                { name: 'Jet Li', power: 8000 }
            ],
        })
    })
    
    app.use(vuetify).mount('#app')
</script>