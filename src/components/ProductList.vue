<template>
 <MainHeader />
<div class="container overflow-hidden">
    <div class="row  justify-content-start align-items-start m-1 ">
        <div class="col-md-12 shadow mb-5 bg-body rounded p-4" style="min-height: 250px;">
           
        </div>
    </div>

</div>

</template>

<script>
import MainHeader from './MainHeader.vue'
export default {
    name : 'ProductList',
     components: {
    // HelloWorld,
    MainHeader,

  },
}
</script>