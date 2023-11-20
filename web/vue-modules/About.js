

export default {
    props: {
      show: Boolean
    },
    methods:{
        toHome() {
            this.$router.push('/')
        }
    },
    created() {
        console.log(this.$route.query);
        this.id = this.$route.query.id
    },
    template: `
        <div>
            <h2>About {{ id }}</h2>
            <v-btn @click="toHome()">Home</v-btn>
        </div>
    `
  }
  