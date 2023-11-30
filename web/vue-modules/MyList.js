

export default {
    // props: {
    //   myItems: Array
    // },
    props:[
        "my_items"
    ],
    methods:{
        
    },
    template: `
            <div>
            <h4>My List</h4>
            <ul>
                <li v-for="item in my_items">
                    {{ item.username }}
                </li>
            </ul>
            </div>
    `
  }
  