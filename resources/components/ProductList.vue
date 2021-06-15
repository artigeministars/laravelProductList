<template>
<div class="container bg-info">
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
    <li v-for="category in dataC" :key="category.id" :id="category.id">
      <button class="dropdown-item" type="button" @click.prevent="filterByCategory(category.id)">{{category.category_name}}</button>
      </li>
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
                <input type="checkbox" class="btn-check" :id="'btn-check-outlined_'+product.id" autocomplete="off">
<label class="btn btn-outline-primary" :for="'btn-check-outlined_'+product.id">
  {{ product.status==1 ? 'Active' : 'Passive' }}
  </label>
     </td>
    </tr>
    <p v-if="loading || loadingC">Loading...</p>

  </tbody>
</table>
<p v-if="error">{{error}}</p>
<p v-else-if="errorC">{{errorC}}</p>
</div>    
</template>
<script>
import { onMounted , provide ,ref } from "vue";
import SearchComponent from './SearchComponent.vue';
import AddComponent from './AddComponent.vue';
import { useAsync } from '../js/hooks/fetchProducts';
import { getProductsAsync, getProductsByCategoryAsync } from '../js/services/ProductService';
import { getCategoriesAsync } from '../js/services/CategoryService';


export default {
  components: { SearchComponent, AddComponent },
    setup() {
   
   const { data, error, loading, run: fetchProducts } = useAsync(getProductsAsync);
  
   const { data: dataC, error: errorC, loading: loadingC, run: fetchCategories } = useAsync(getCategoriesAsync);
   
   const filterByCategory = (id) => {
   
     loading.value = true;
     Promise.resolve(getProductsByCategoryAsync(id)).then(response => {
     data.value = response.data;
     }).catch((error) => {
     error.value = error;
     });
       loading.value = false;
   };

  provide('productDatas',ref(data));
  const updateData = (datas) => {
    data.value = datas;
  }
  provide('updateProductDatas',updateData);

        onMounted(() => {

        fetchProducts();
        fetchCategories();

       // fetchData();
       console.log("ProductList component mounted!");
       // console.log("products",getProductsAsync());
        });

      return { data,loading,error,dataC,loadingC,errorC,filterByCategory };
    },
}
</script>
<style scoped>

</style>
