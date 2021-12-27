<template>
  <MainHeader />
  <div class="container overflow-hidden display-flex">
    <div class="row g-3 justify-content-start m-1 justify-content-start">
      <div class="col-lg-4 shadow p-3 bg-body rounded p-4">
        <form
          action="../handler/save_handler.php"
          method="POST"
          id="product_form"
        >
          <div class="mb-3">
            <label for="sku" class="form-label d-flex">SKU</label>
            <input
              type="text"
              class="form-control"
              id="sku"
              name="product_sku"
              required
            />
          </div>
          <div class="mb-3">
            <label for="name" class="form-label d-flex">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="product_name"
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
              step="0.01"
              required
            />
          </div>
          <div class="mb-3">
            <label for="productType" class="form-label d-flex">Type</label>
            <select
              v-model="selected"
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
            v-if="selected === 'disc_detail'"
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
            v-if="selected === 'furniture_detail'"
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
            v-if="selected === 'book_detail'"
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
            <button
              class="btn btn-primary d-flex mt-5"
              id="submit"
              aria-current="page"
              href="view/_add_product.php"
            >
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import MainHeader from "./MainHeader.vue";
export default {
  name: "AddProduct",
  components: {
    MainHeader,
  },
  data() {
    return {
      selected: "",
    };
  },
};
</script>

<style scoped>
label {
  justify-content: start;
}
</style>