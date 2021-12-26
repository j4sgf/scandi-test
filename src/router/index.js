import { createWebHistory, createRouter } from "vue-router";
import ProductList from "../components/ProductList.vue";
import AddProduct from "../components/AddProduct.vue";

const routes = [
  {
    path: "/",
    name: "Product List",
    component: ProductList,
  },
  {
    path: "/add",
    name: "Add Product",
    component: AddProduct,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;