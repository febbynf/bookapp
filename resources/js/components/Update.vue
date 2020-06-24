<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Update data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function updateData() -->
        <form @submit.prevent="updateData()">
          <div class="form-group">
            <label>Name</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your name"
              v-model="form.name"
              required
            >
          </div>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: ""
      }
    };
  },
  created() {
    // load data saat pertama kali halaman dibuka
    this.loadData();
  },
  methods: {
    loadData() {
      // load data berdasarkan id
      axios
        .get("http://localhost:8000/api/author/" + this.$route.params.id)
        .then(response => {
          // post value yang dari response ke form
          this.form.name = response.data.name;
        });
    },
    updateData() {
      // put data ke api menggunakan axios
      axios
        .put("http://localhost:8000/api/author/" + this.$route.params.id, {
          name: this.form.name
        })
        .then(response => {
          // push router ke read data
          this.$router.push("/");
        });
    }
  }
};
</script>
