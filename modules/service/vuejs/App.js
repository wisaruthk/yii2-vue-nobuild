const { createApp } = Vue;
const { createVuetify } = Vuetify;
import ServiceHeader from "./ServiceHeader.js"; // ดึง component ได้โดยอ้างจาก current path

const vuetify = createVuetify();

const app = createApp({
  components: {
    ServiceHeader,
  },
  data: () => ({
    myTitle: "Hello",
  }),
});

app.use(vuetify).mount("#app");
