<template>
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
import { onMounted , reactive } from "vue";
export default {
    setup() {

       const formData = reactive({
            product_code: '',
            product_name: '',
            category_id: 3,
            quantity: '',
            status: 1
       });

       const onSubmit = () => {
         Promise.resolve(addProductAsync(formData)).then(response => {
           if(response.status === 200){
             console.log("successfully added!");
           
           }
         }).catch(error =>{
           if(error){
             console.log(error);
           }
         });
           // ???
           formData.value = {
            product_code: '',
            product_name: '',
            category_id: 3,
            quantity: '',
            status: 1
       };
       }

        const { data: dataCategories, error: errorCategory, loading: loadingCategory, run: fetchCategories } = useAsync(getCategoriesAsync);
   
     onMounted(() => {
fetchCategories();
     });

     return {dataCategories,errorCategory,loadingCategory,onSubmit,formData};
    },
}
</script>
