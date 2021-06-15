<template>

<div v-if="showError" class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Missing Field!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="collapse" id="collapseProduct">
    <form class="row row-cols-lg-auto g-3 align-items-center" @submit.prevent="onSubmit">
  <div class="col-12">
    <div class="input-group">
      <input type="text" v-model.trim="formData.product_code" class="form-control" id="inlineFormInputGroupCode" placeholder="Product Code">
    </div>
  </div>
 <div class="col-12">
    <div class="input-group">
      <input type="text" v-model.trim="formData.product_name" class="form-control" id="inlineFormInputGroupName" placeholder="Product Name">
    </div>
  </div>

  <div class="col-12">
  <select v-model.trim.number="formData.category_id" class="form-select" >
    <option selected value="3">Categories</option>
      <option :value="category.id" v-for="category in dataCategories" :key="category.id" :id="'inlineFormSelectCategory'+category.id">{{category.category_name}}</option>
    </select>
  </div>

 <div class="col-12">
    <div class="input-group">
      <input type="text"  v-model.trim="formData.quantity" class="form-control" id="inlineFormInputGroupQuantity" placeholder="Product Quantity">
    </div>
  </div>

<div class="col-12">
    <select class="form-select" v-model="formData.status" id="inlineFormSelectCategory">
      <option selected value="1">Active</option>
      <option value="2">Passive</option>
    </select>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
<p v-if="errorCategory">
  {{errorCategory}}
</p>
</template>
<script>
import {useAsync } from "../js/hooks/fetchProducts";
import { getCategoriesAsync } from '../js/services/CategoryService';
import { addProductAsync } from "../js/services/ProductService";
import { onMounted , reactive , ref , inject } from "vue";
export default {
    setup() {

   const updateProductData = inject('updateProductData');


       const formData = reactive({
            product_code: '',
            product_name: '',
            category_id: 3,
            quantity: '',
            status: 1
       });

       const showError = ref(false);

       const onSubmit = () => {
         if(formData.product_code === ''){
           showError.value = true;
           return ;
         }
         
         if(formData.product_name === ''){
           showError.value = true;
           return ;
         }

         if(formData.category_id === ''){
           showError.value = true;
           return ;
         }
         
         if(formData.quantity === ''){
           showError.value = true;
           return ;
         }

          if(formData.status === ''){
            showError.value = true;
           return ;
         }

         Promise.resolve(addProductAsync(formData)).then(response => {
           if(response.status === 200){
             updateProductData();
             console.log("successfully added!");
           
           }
         }).catch(error =>{
           if(error){
             console.log(error);
           }
         });


       }

        const { data: dataCategories, error: errorCategory, loading: loadingCategory, run: fetchCategories } = useAsync(getCategoriesAsync);
   
     onMounted(() => {
fetchCategories();
     });

     return {dataCategories,errorCategory,loadingCategory,onSubmit,formData,showError};
    },
}
</script>
