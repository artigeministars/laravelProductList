<template>
<div class="collapse" id="collapseProduct">
    <form class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <div class="input-group">
      <input type="text" class="form-control" id="inlineFormInputGroupCode" placeholder="Product Code">
    </div>
  </div>
 <div class="col-12">
    <div class="input-group">
      <input type="text" class="form-control" id="inlineFormInputGroupName" placeholder="Product Name">
    </div>
  </div>

  <div class="col-12">
    <select class="form-select" id="inlineFormSelectCategory">
      <option selected>Choose...</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>

 <div class="col-12">
    <div class="input-group">
      <input type="text" class="form-control" id="inlineFormInputGroupQuantity" placeholder="Product Quantity">
    </div>
  </div>

<div class="col-12">
    <select class="form-select" id="inlineFormSelectCategory">
      <option selected value="1">Active</option>
      <option value="2">Passive</option>
    </select>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</template>
<script>

export default {
    setup() {
        
    },
}
</script>
