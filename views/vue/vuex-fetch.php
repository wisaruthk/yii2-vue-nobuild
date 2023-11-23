<?php

/* @var $this yii\web\View */

$this->title = 'PDPA - ROPA : Record of Activities';
?>
<?php
    $apps = @Yii::$app->params['app_shortcuts'];
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.js"></script>
<script src="https://unpkg.com/vuex@4.1.0/dist/vuex.global.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.css"/>

<div class="site-index">
    <div id="app">
        <v-container>
            <counter></counter>
            <v-btn @click="increment()">Increase</v-btn>
            <v-btn @click="incrementTen()">Increase 10</v-btn>
        </v-container>
        <v-container>
            <v-btn @click="incrementDispatch()">Increase Dispatch</v-btn>
        </v-container>
        <v-container>
            <v-btn @click="fetchUser()">Fetch User</v-btn>
            <ul>
                <li v-for="u in this.$store.state.users" :key="u.username">{{ u.username }}</li>
            </ul>
        </v-container>
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
                count: 0,
                users: []
            }
        },
        mutations: {
            // mutations have to be synchronous.
            increment (state) {
                state.count++
            },
            incrementWithPayload (state, payload) {
                state.count += payload.amount
            },
            saveUsers (state, payload) {
                state.users = payload.users
            }
        },
        actions: {
            // Actions are similar to mutations, the differences being that:
            // * Instead of mutating the state, actions commit mutations.
            // * Actions can contain arbitrary asynchronous operations.
            incrementSimple (context) {
                const { commit } = context // example of extract commit from context

                context.commit('increment')
            },
            fetchUser ({ commit }) {
                // Using Fetch API
                fetch("./get-users")
                .then((response) => {
                    if (!response.ok) {
                    throw new Error("HTTP error! Status: ${response.status}");
                    }
                    return response.json();
                })
                .then((data) => {
                    console.log(data); // data.users and data.totalItems
                    commit('saveUsers',data) // data is payload
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                })
                
            }
        },
        strict:true
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
            },
            incrementDispatch() {
                // Actions are triggered with the store.dispatch method;
                this.$store.dispatch('incrementSimple')
            },
            fetchUser(){
                this.$store.dispatch('fetchUser')
            }
        }
    })
    
    app
    .use(vuetify)
    .use(store)
    .mount('#app')
</script>