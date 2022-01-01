<template>
  <div v-if="isProductList" class="container overflow-hidden sticky-top">
    <div class="row justify-content-start m-1">
      <div class="col-lg-12 shadow p-0 mb-0 bg-body rounded p-0">
        <nav
          class="navbar navbar-expand-lg navbar-light"
          style="background-color: transparent"
        >
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Product List</a>
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
            <div
              class="
                collapse
                navbar-collapse
                 w-100
                order-1
                ms-auto
                order-md-0
                dual-collapse2

                mt-2
               
              "
              id="navbarSupportedContent"
            >
              <div class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item me-2 mb-2 d-flex justify-content-end ">
                  <button @click="$router.push('add')" class="btn btn-outline-success" aria-current="page"
                    >ADD</button
                  >
                </li>
                <li class="nav-item me-2 mb-2 d-flex justify-content-end">
                  <button
                    class="btn btn-danger"
                    aria-current="page"
                    id="delete-product-btn"
                    @click="deleteAll()"
                  >
                    MASS DELETE
                  </button>
                </li>
                <li class="nav-item mt-1 d-flex justify-content-end me-2">
                </li>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <div v-if="isAddProduct" class="container overflow-hidden sticky-top">
    <div class="row justify-content-start m-1">
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
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mt-2 mb-lg-0">
                <li class="nav-item btn-nav d-flex justify-content-end">
                  <button
                    @click="$router.push('/')"
                    class="btn btn-danger navbar-btn"
                    aria-current="page"
                  >
                    Cancel
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MainHeader",
  methods: {
    reloadPage() {
      console.log(this.$route.name)
      window.location.reload();
    },
    deleteAll(){
      this.$emit('delete-product')
    },
  },
  computed: {
  isProductList() {
     return this.$route.name === 'Product List'
  },
  isAddProduct(){
     return this.$route.name === 'Add Product'
  }
}
};
</script>