//const { ref } = Vue;
import { ref } from "vue";
// MyDialog.js

export default {
  //   setup() {
  //     const dialog = ref(false);

  //     // expose to template and other options API hooks
  //     return {
  //       dialog,
  //     };
  //   },
  props: {
    btnName: String,
  },
  data: () => ({
    employee: {},
    dialog: false,
  }),
  methods: {
    save() {
        this.dialog = false 
        console.log("save ....", this.employee)
    }
  },
  template: "#my-dialog-template",
};
