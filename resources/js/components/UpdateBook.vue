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
            <label>Title</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your title"
              v-model="form.title"
              required
            >
            <label>Author</label>
            <input
              type="textfield"
              class="form-control"
              placeholder="Input your author"
              v-model="form.authorId"
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
        title: "",
        authorId: ""
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
        .get("http://localhost:8000/api/book/" + this.$route.params.id)
        .then(response => {
          // post value yang dari response ke form
          this.form.title = response.data.title;
          this.form.authorId = response.data.author_id;
        });
    },
    updateData() {
      // put data ke api menggunakan axios
      axios
        .put("http://localhost:8000/api/book/" + this.$route.params.id, {
          title: this.form.title,
          author_id: this.form.authorId
        })
        .then(response => {
          // push router ke read data
          this.$router.push("/book");
        });
    }
  }
};
</script>
