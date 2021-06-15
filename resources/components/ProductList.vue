<template>
<div class="container  bg-info">
  <search-component></search-component>
  <add-component></add-component>
    <table class="table table-striped table-success table-hover mt-4">
<thead>
    <tr>
      <th scope="col">#Code</th>
      <th scope="col">Name</th>
      <th scope="col">
<div class="btn-group">
  <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle font-weight-bold" data-bs-toggle="dropdown" aria-expanded="false">
    Category
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><button class="dropdown-item" type="button">Action</button></li>
    <li><button class="dropdown-item" type="button">Another action</button></li>
    <li><button class="dropdown-item" type="button">Something else here</button></li>
  </ul>
</div>

</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
       <td>
                  <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
<label class="btn btn-outline-primary" for="btn-check-outlined">Active</label>


       </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
       <td>
                  <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
<label class="btn btn-outline-primary" for="btn-check-outlined">Single toggle</label>


       </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
       <td>
         <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
<label class="btn btn-outline-primary" for="btn-check-outlined">Single toggle</label>

       </td>
       
    </tr>
  </tbody>
</table>
</div>    
</template>
<script>
import { onMounted } from "vue";
import SearchComponent from './SearchComponent.vue';
import AddComponent from './AddComponent.vue';
export default {
  components: { SearchComponent, AddComponent },
    setup() {
        onMounted(() => {
 
       console.log("ProductList component mounted!");
        });
    },
}
</script>
<style scoped>

</style>
