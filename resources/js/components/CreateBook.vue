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
  data(){
    return{
      form:{
        title: '',
        authorId: ''
      }
    }
  },
  methods: {
    addData() {
      // post data ke api menggunakan axios
      axios
        .post("http://localhost:8000/api/book", {
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