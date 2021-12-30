<template>
  <MainHeader />
  <div class="container overflow-hidden display-flex">
    <div class="row g-3 justify-content-start m-1 justify-content-start">
      <div class="col-lg-4 shadow p-3 bg-body rounded p-4">
        <form
          id="product_form"
        >
          <div class="mb-3">
            <label for="sku" class="form-label d-flex">SKU</label>
            <input
              type="text"
              class="form-control"
              id="sku"
              name="product_sku"
              v-model="product.product_sku"
              required
            />
            {{product.product_sku}}
          </div>
          <div class="mb-3">
            <label for="name" class="form-label d-flex">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="product_name"
              v-model="product.product_name"
              required
            />
          </div>
          <label for="price" class="form-label d-flex">Price</label>
          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input
              type="number"
              class="form-control"
              id="price"
              name="product_price"
              v-model="product.product_price"
              step="0.01"
              required
            />
          </div>
          <div class="mb-3">
            <label for="productType" class="form-label d-flex">Type</label>
            <select
              v-model="product.product_type"
              class="form-select"
              ref="productType"
              id="productType"
              name="productType"
              
              required
            >
              <option value="" disabled selected>Select Product Type</option>
              <option value="disc_detail">DVD</option>
              <option value="furniture_detail">Furniture</option>
              <option value="book_detail">Book</option>
            </select>
          </div>
          <div
            v-if="product.product_type === 'disc_detail'"
            id="disc_detail"
            class="option-target"
          >
            <label for="size" class="form-label d-flex">Size</label>
            <div class="input-group">
              <input
                type="number"
                class="form-control field-target"
                id="size"
                name="disc_size"
                v-model="product.disc_size"
                aria-describedby="discHelpInline"
                step="0.01"
                required
              />
              <span class="input-group-text">MB</span>
            </div>
            <div id="discHelpBlock" class="form-text mb-3 d-flex">
              Please provide size.
            </div>
          </div>
          <div
            v-if="product.product_type === 'furniture_detail'"
            id="furniture_detail"
            class="option-target"
          >
            <label for="height" class="form-label d-flex">Height</label>
            <div class="input-group mb-3">
              <input
                type="number"
                class="form-control field-target"
                id="height"
                name="height"
                v-model="product.furniture_height"
                required
              />
              <span class="input-group-text">cm</span>
            </div>
            <label for="width" class="form-label d-flex">Width</label>
            <div class="input-group mb-3">
              <input
                type="number"
                class="form-control field-target"
                id="width"
                name="width"
                v-model="product.furniture_width"
                required
              />
              <span class="input-group-text">cm</span>
            </div>
            <label for="length" class="form-label d-flex">Length</label>
            <div class="input-group">
              <input
                type="number"
                class="form-control field-target"
                id="length"
                name="length"
                v-model="product.furniture_length"
                aria-describedby="dimensionHelpInline"
                required
              />
              <span class="input-group-text">cm</span>
            </div>
            <div id="dimensionHelpBlock" class="form-text mb-3 d-flex">
              Please provide dimension.
            </div>
          </div>
          <div
            v-if="product.product_type === 'book_detail'"
            id="book_detail"
            class="option-target"
          >
            <label for="weight" class="form-label d-flex">Weight</label>
            <div class="input-group">
              <input
                type="number"
                class="form-control field-target"
                id="weight"
                name="weight"
                v-model="product.book_weight"
                aria-describedby="weightHelpInline"
                step="0.01"
                required
              />
              <span class="input-group-text">Kg</span>
            </div>
            <div id="weightHelpBlock" class="form-text mb-3 d-flex">
              Please provide weight.
            </div>
          </div>
          <div>
            <button @click="saveProduct"
              class="btn btn-primary d-flex mt-5"
              type="button"
              id="submit"
              aria-current="page"
            >
              Save
            </button>
          </div>
          <div></div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import DataService from "../services/DataServices";
import MainHeader from "./MainHeader.vue";
import qs from 'qs';
export default {
  name: "AddProduct",
  components: {
    MainHeader,
  },
  data() {
    return {
      selected: "",
      product: {
        product_type:"",
        product_sku: "",
        product_name: "",
        product_price: "",
        book_weight: "",
        disc_size: "",
        furniture_height: "",
        furniture_width: "",
        furniture_length: "",
      },
      submitted: false,
    };
  },
  methods: {
    saveProduct() {
      var data = qs.stringify( {
        product_type: this.product.product_type,
        product_sku: this.product.product_sku,
        product_name: this.product.product_name,
        product_price: this.product.product_price,
        book_weight: this.product.book_weight,
        disc_size: this.product.disc_size,
        furniture_height: this.product.furniture_height,
        furniture_width: this.product.furniture_width,
        furniture_length: this.product.furniture_length,
        
      });
      
      DataService.create(data)
      .then(response => {
          this.product.product_sku = response.data.product_sku;
          console.log(response.data);
          this.submitted = true;
          
        })
        .catch(e => {
          
          console.log(e);
        }).then( this.$router.push('/'))
        
    },
    
    newProduct() {
      this.submitted = false;
      this.tutorial = {};
    },
    
  },
};
</script>

<style scoped>

</style>