<?php

/* @var $this yii\web\View */

$this->title = 'PDPA - ROPA : Record of Activities';
?>
<?php
    $apps = @Yii::$app->params['app_shortcuts'];
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.js"></script>
<script src="https://unpkg.com/vuex@4.0.0/dist/vuex.global.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.css"/>

<div class="site-index">
    <div id="app">
        <counter></counter>
        <v-btn @click="increment()">Increase</v-btn>
        <v-btn @click="incrementTen()">Increase 10</v-btn>
    </div>
</div>

<script type="module">
    const { createApp } = Vue
    const { createVuetify } = Vuetify
    const { createStore } = Vuex

    const vuetify = createVuetify()

    // Create a new store instance.
    const store = createStore({
        state () {
            return {
                count: 0
            }
        },
        mutations: {
            increment (state) {
                state.count++
            },
            incrementWithPayload (state, payload) {
                state.count += payload.amount
            }
        }
    })

    // Components
    const Counter = {
        template: `<div>{{ count }}</div>`,
        computed: {
            count() {
                return this.$store.state.count
            }
        }
    }

    // Main App
    const app = createApp({
        components:{
            Counter
        },
        methods: {
            increment() {
                this.$store.commit('increment')
                // console.log(this.$store.state.count)
            },
            incrementTen() {
                this.$store.commit('incrementWithPayload', {
                    amount: 10
                })
            }
        }
    })
    
    app
    .use(vuetify)
    .use(store)
    .mount('#app')
</script>