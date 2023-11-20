import FakeAPI from "./FakeAPI.js";

// DataTable.js

export default {
    props: {
      items: {
        type: Array,
        default: () => [],
      },
    },
    template: `
    <v-data-table-server
        v-model:items-per-page="itemsPerPage"
        :headers="headers"
        :items-length="totalItems"
        :items="serverItems"
        :loading="loading"
        item-value="name"
        @update:options="loadItems"
    ></v-data-table-server>
    `,
    data: () => ({
        itemsPerPage: 5,
        headers: [
          {
            title: 'Dessert (100g serving)',
            align: 'start',
            sortable: false,
            key: 'name',
          },
          { title: 'Calories', key: 'calories', align: 'end' },
          { title: 'Fat (g)', key: 'fat', align: 'end' },
          { title: 'Carbs (g)', key: 'carbs', align: 'end' },
          { title: 'Protein (g)', key: 'protein', align: 'end' },
          { title: 'Iron (%)', key: 'iron', align: 'end' },
        ],
        serverItems: [],
        loading: true,
        totalItems: 0,
      }),
    methods: {
        loadItems ({ page, itemsPerPage, sortBy }) {
          this.loading = true
          FakeAPI.fetch({ page, itemsPerPage, sortBy }).then(({ items, total }) => {
            this.serverItems = items
            this.totalItems = total
            this.loading = false
          })
        },
    },
  };
  