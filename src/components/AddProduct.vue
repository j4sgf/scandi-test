<template>
  <div class="container overflow-hidden sticky-top">
    <div class="row g-3 justify-content-start m-1">
      <div class="col-lg-12 shadow p-0 mb-0 bg-body rounded p-0">
        <nav
          class="navbar navbar-expand-lg navbar-light"
          style="background-color: transparent"
        >
          <div class="container-fluid">
            <a class="navbar-brand" href="#">New Product</a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <button @click="$router.push('/')" class="btn btn-danger" aria-current="page"
                    >Cancel</button
                  >
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <div class="container overflow-hidden">
    <div class="row g-3 justify-content-start m-1">
      <div class="col-lg-4 shadow p-3 bg-body rounded p-4 ">
        <form
          action="../handler/save_handler.php"
          method="POST"
          id="product_form"
        >
          <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input
              type="text"
              class="form-control"
              id="sku"
              name="product_sku"
              required
            />
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="product_name"
              required
            />
          </div>
          <label for="price" class="form-label">Price</label>
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
            <label for="productType" class="form-label">Type</label>
            <select
            v-model="selected"
              class="form-select"
              ref= "productType"
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
          <div v-if="selected === 'disc_detail'" id="disc_detail" class="option-target">
            <label for="size" class="form-label">Size</label>
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
            <div id="discHelpBlock" class="form-text mb-3">
              Please provide size.
            </div>
          </div>
          <div v-if="selected === 'furniture_detail'" id="furniture_detail" class="option-target" >
            <label for="height" class="form-label">Height</label>
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
            <label for="width" class="form-label">Width</label>
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
            <label for="length" class="form-label">Length</label>
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
            <div id="dimensionHelpBlock" class="form-text mb-3">
              Please provide dimension.
            </div>
          </div>
          <div v-if="selected === 'book_detail'" id="book_detail" class="option-target" >
            <label for="weight" class="form-label">Weight</label>
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
            <div id="weightHelpBlock" class="form-text mb-3">
              Please provide weight.
            </div>
          </div>
          <div>
            <button
              class="btn btn-primary"
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
export default {
  name: "AddProduct",
  data() {
      return{
          selected: ''
      }
  }
};
</script>

<style scoped>
label {
    justify-content: start;
}
</style>