<template>
  <ProductList v-if="isProductList" />
  <AddProduct v-if="isAddProduct" />
  
</template>

<script>


import ProductList from './components/ProductList.vue'
import AddProduct from './components/AddProduct.vue'
import "../node_modules/bootstrap/dist/css/bootstrap.min.css"
import "../node_modules/bootstrap/dist/js/bootstrap.min.js"


export default {
  name: 'App',
  components: {
    AddProduct,
    ProductList
  },
  computed: {
  isProductList() {
     return this.$route.name === 'Product List'
  },
  isAddProduct(){
     return this.$route.name === 'Add Product'
  }
}
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
