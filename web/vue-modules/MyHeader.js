

export default {
    props: {
      title: String
    },
    methods:{
        toAbout() {
            this.$router.push('/about?id=1')
        }
    },
    template: `
            <h1>Header - {{title}}</h1>
    `
  }
  