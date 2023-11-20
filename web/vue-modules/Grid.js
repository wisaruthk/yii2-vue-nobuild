export default {
    props: {
      data: Array,
      columns: Array,
      filterKey: String
    },
    data() {
      return {
        sortKey: '',
        sortOrders: this.columns.reduce((o, key) => ((o[key] = 1), o), {})
      }
    },
    computed: {
      filteredData() {
        const sortKey = this.sortKey
        const filterKey = this.filterKey && this.filterKey.toLowerCase()
        const order = this.sortOrders[sortKey] || 1
        let data = this.data
        if (filterKey) {
          data = data.filter((row) => {
            return Object.keys(row).some((key) => {
              return String(row[key]).toLowerCase().indexOf(filterKey) > -1
            })
          })
        }
        if (sortKey) {
          data = data.slice().sort((a, b) => {
            a = a[sortKey]
            b = b[sortKey]
            return (a === b ? 0 : a > b ? 1 : -1) * order
          })
        }
        return data
      }
    },
    methods: {
      sortBy(key) {
        this.sortKey = key
        this.sortOrders[key] = this.sortOrders[key] * -1
      },
      capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1)
      }
    },
    template: `
    <table v-if="filteredData.length">
      <thead>
        <tr>
          <th v-for="key in columns"
            @click="sortBy(key)"
            :class="{ active: sortKey == key }">
            {{ capitalize(key) }}
            <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="entry in filteredData">
          <td v-for="key in columns">
            {{entry[key]}}
          </td>
        </tr>
      </tbody>
    </table>
    <p v-else>No matches found.</p>
    `
  }
  