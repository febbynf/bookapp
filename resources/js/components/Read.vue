<template>
  <div>
   
    <div class="row">
      <div class="col-md-12">
        <br>
        <br>
        <div class="row">
          <div class="col-md-10">
            <h4>Authors</h4>
          </div>
          <div class="col-md-2">
            
            <router-link class="btn btn-primary w-100" to="/create">+ Create</router-link>
          </div>
        </div>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="author in authors" :key="author.id">
              <td style="width:60%">{{author.name}}</td>
              <td style="width:40%">
                <router-link class="btn btn-warning" :to="'/detail/'+author.id">Update</router-link>
                <button class="btn btn-danger" v-on:click="deleteData(author.id)">Delete</button>
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
      authors: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/author").then(response => {
        
        this.authors = response.data;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/author/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script>