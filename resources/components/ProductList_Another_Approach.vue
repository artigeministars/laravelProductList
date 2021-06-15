<template>
<div class="container  bg-info">
  <search-component></search-component>
  <add-component></add-component>
    <table v-if="data !== null" class="table table-striped table-success table-hover mt-4">
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
  <tr v-for="product in data" :key="product.id" :id="product.id">
     <th scope="row">{{product.product_code}}</th>
 
    <td>{{product.product_name}}</td>
     <td>{{product.category_name}}</td>

     <td>{{product.quantity}}</td>

     <td>
                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
<label class="btn btn-outline-primary" for="btn-check-outlined">
  {{ product.status==1 ? 'Active' : 'Passive' }}
  </label>

     </td>
    </tr>

    <p v-if="loading">Loading...</p>

  </tbody>
</table>
<p v-if="error">{{error}}</p>
</div>    
</template>
<script>
import { onMounted , ref } from "vue";
import SearchComponent from './SearchComponent.vue';
import AddComponent from './AddComponent.vue';
import { useAsync } from '../js/hooks/fetchProducts';
import { getProductsAsync } from '../js/services/ProductService';

export default {
  components: { SearchComponent, AddComponent },
    setup() {
      
    const data = ref(null);
    const loading = ref(true);
    const error = ref(null);

    const fetchData = () => {
     loading.value = true;
     Promise.resolve(getProductsAsync()).then(response => {
     data.value = response.data;
     }).catch((error) => {
     error.value = error;
     });
       loading.value = false;
    };


        onMounted(() => {

/*
const { data, error, isLoading, run: fetchProducts } = useAsync( async () => {
            const response = await getProductsAsync();
            return response.data.data;
        }
        );

         const run = async () => {
        try {
data.value = await getProductsAsync();
        }
        catch(error) {

        }
        finally {

        }
    }
*/
 fetchData();
       console.log("ProductList component mounted!");
      // console.log("products",getProductsAsync());
        });

      return {
      data,
      loading,
      error
    };
    },
}
</script>
<style scoped>

</style>
