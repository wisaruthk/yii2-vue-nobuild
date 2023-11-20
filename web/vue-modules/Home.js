

export default {
    props: {
      show: Boolean
    },
    methods:{
        toAbout() {
            this.$router.push('/about?id=1')
        }
    },
    template: `
        <div>
            <h2>HOME</h2>
            <v-btn @click="toAbout()">About</v-btn>
        </div>
    `
  }
  