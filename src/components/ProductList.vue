<template>
  <MainHeader @delete-product="saveProductId" />
  <div class="container overflow-hidden">
    <div class="row justify-content-start align-items-start m-1">
      <div
        class="col-md-12 shadow mb-5 bg-body rounded p-4"
        style="min-height: 250px"
      >
      <div class="form-check d-flex justify-content-center mt-auto mb-3 ">
          <input type="checkbox" class="form-check-input me-2" id="select-all" @click="selectAll" v-model="allSelected">
          <label for="select-all" class="form-label d-flex">Select All</label>
        </div>
        <div
          class="
            row
            justify-content-start
            row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4
            align-items-start'
            id='allProducts'
          "
        >
        
          <div v-for="value in products" v-bind:key="value[0]">
            <div class="container-lg overflow-auto">
              <div
                class="
                  col-12
                  shadow
                  mb-5
                  bg-body
                  rounded
                  p-4
                  overflow-auto
                  justify-content-center
                  align-item-center
                "
                style="min-height: 260px"
              >
                <div class="form-check d-flex justify-content-start">
                  <input
                    v-model="deleteCheckbox"
                    class="form-check-input delete-checkbox mb-3"
                    name="displayboxcheck"
                    id="delete-checkbox"
                    type="checkbox"
                    :value="value[0]"
                    @change="updateCheckall"

                  />
                </div>
                <div class="text-center justify-content-center">
                  <p class="product_details" v-if="value[1]">{{ value[1] }}</p>
                  <p class="product_details" v-if="value[2]">{{ value[2] }}</p>
                  <p class="product_details" v-if="value[3]">
                    {{ value[3] }} $
                  </p>
                  <p v-if="value[4]">{{ value[4] }} KG</p>
                  <p v-if="value[5]">{{ value[5] }} MB</p>
                  <p v-if="value[6]">
                    Dimension: {{ value[6] }}x{{ value[7] }}x{{ value[8] }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DataService from "../services/DataServices";
import MainHeader from "./MainHeader.vue";
import qs from 'qs';

export default {
  name: "ProductList",
  components: {
    MainHeader,
  },
  emits: ['delete-Product'],
  data() {
    return {
      deleteCheckbox: [],
      products: [],
      selected: [],
        allSelected: false,
      product: {
        product_id:"",
      },
    };
  },
  methods: {
    saveProductId(){
      var id = qs.stringify({ 
        product_id:this.deleteCheckbox
      });
      
      DataService.deleteAll(id)
        .then(() => {
          this.refreshList();
        })
        .catch((e) => {
          console.log(e);
        });
    },
    
    retrieveProduct() {
      DataService.getAll()
        .then((response) => {
          this.products = response.data;

        })
        .catch((e) => {
          console.log(e);
        });
    },



    refreshList() {
      this.retrieveProduct();
    },

    selectAll() {
      this.deleteCheckbox = [];
            this.selected = [];
            if (!this.allSelected) {
              
                for (let i in this.products) {
                    this.selected.push(this.products[i]);
                      this.deleteCheckbox.push(this.selected[i][0])
                }

            }
        },

        updateCheckall: function(){
              if(this.products.length == this.deleteCheckbox.length){
                 this.allSelected = true;
              }else{
                 this.allSelected = false;
              }
        }

  },
  mounted() {
    this.retrieveProduct();
  }
}

</script>

<style scoped>
.product_details {
  text-align: center;
  font-weight: bold;
}
</style>