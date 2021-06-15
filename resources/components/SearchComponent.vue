<template>
    <div class="container mt-4">
  <div class="row gx-2 mt-2">
   <div class="d-flex bd-highlight mb-3">
  <div class="me-auto p-2 bd-highlight">
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
    Add Product
  </button>

  </div>
  
 <div class="p-2 bd-highlight">
     <input type="text" class="form-control" @keyup.enter="doSearch" placeholder="Search Products" aria-label="search" aria-describedby="search">
  </div>
  

</div>
  </div>
</div>
</template>
<script>

import {getSearchedProductsAsync} from "../js/services/SearchService";
import { ref , inject } from "vue";

export default {
    setup() {

      const dataSearch = ref(null);
      const errorSearch = ref(null);

      const productData = inject('productDatas');
      const updateProductData = inject('updateProductDatas');

      const getSearchValues = (keyword) => {
        Promise.resolve(getSearchedProductsAsync(keyword)).then(response => {
            dataSearch.value = response.data;
            productData.value = response.data;
            updateProductData(response.data);
        }).catch(error => {
          errorSearch.value = error;
        });
      }

        const doSearch = (event) => {
         
         getSearchValues(event.target.value);
        // console.log("writtent value",event.key,event.target.value);
         event.target.value = '';
         console.log("search value",dataSearch);
        }

        return { doSearch,dataSearch ,errorSearch};
    },
}
</script>
