<template>
  <div>
    <div class="row">
      <div class="col-md-6">
        <br>
        <br>
        <h4>Create new data</h4>
        <br>
        <!-- prevent form submit untuk reload halaman, kemudian memanggil function addData() -->
        <form @submit.prevent="addData()">
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
  data(){
    return{
      form:{
        name: ''
      }
    }
  },
  methods: {
    addData() {
      // post data ke api menggunakan axios
      axios
        .post("http://localhost:8000/api/author", {
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