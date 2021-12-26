<template>
  <ProductList v-if="isProductList" />
  <!-- <router-view /> -->
</template>

<script>

// import HelloWorld from '../../components/HelloWorld.vue'
import ProductList from '../../components/ProductList.vue'
import "../../../node_modules/bootstrap/dist/css/bootstrap.css"
import "../../../node_modules/bootstrap/dist/js/bootstrap.min.js"
// import "../../api/db_conn.php"

export default {
  name: 'App',
  components: {
    // HelloWorld,
    ProductList
  },
  computed: {
  isProductList() {
     return this.$route.name === 'Product List'
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
