<template>
  <div>
   
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h4>Books</h4>
          </div>
          <div class="col-md-2">
            
            <router-link class="btn btn-primary w-100" to="/create/book">+ Create</router-link>
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="book in books" :key="book.id">
              <td style="width:40%">{{book.title}}</td>
              <td style="width:40%">{{book.author_id}}</td>
              <td style="width:20%">
                <router-link class="btn btn-warning" :to="'/update/book/'+book.id">Update</router-link>
                <button class="btn btn-danger" v-on:click="deleteData(book.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<!-- script js -->
<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      books: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/book").then(response => {
        
        this.books = response.data;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/book/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>