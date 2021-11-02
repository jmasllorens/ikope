<template>
    <Head title="Products" />

  

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                     Products
                    </div>
                </div>
                </div>

            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 
        </div>

         <br>
         
         <!--  <div class="flex justify-center items-center">
          
                <BreezeButton>
                        <a :href="route('publications_create')" method="get">New Publication</a></BreezeButton>
         
          </div> -->
          
      

        <br />

        <div
          
          class="bg-gray-300 dark:bg-light_secondary rounded-lg py-5 px-5"
        >
         
          <br />
          <div class="grid grid-cols-3 px-10 gap-2">
            <span
              v-for="product in $page.props.products"
              v-bind:key="product"
            >
              <span class="flex justify-center items-center">
               
                  <div
                    class="
                      hover:scale-105
                      transform
                      transition-all
                      duration-500
                    "
                  >
                    <!-- Start Card -->

                   <div class="flex justify-center">
                      <img :src="`${product.image}`" alt="Publication cover" style="width:75%; border-radius:5px" />
                    </div>
                   
                     
                  
                  </div>
           
                   


             
              </span>

              <br>
                
              <div class="grid justify-items-center mb-2 ml-11 mr-11">
              
             <h2 class="font-semibold text-m text-gray-800"> {{product.name}}</h2> 
             <h2 class="font-semibold text-m text-gray-800"> {{product.price}} €</h2> 
      
             <div class=" flex inline-block justify-between mt-2">
          <button @click.prevent="addToCart(product.id)" class="mr-2"><img class="cursor-pointer" />Add to Cart</button>
         </div> 
              
            </div>
      
            <br>
            </span>
            </div>
        </div>
    </div>



      
    </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeButton from '@/Components/Button.vue'
import BreezeInput from '@/Components/Input.vue'
import { Head } from '@inertiajs/inertia-vue3'



export default {
    props: ['products'],
    
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,

    },


    methods: {
      addToCart(id) {
         this.$inertia.get(`/addtocart/${id}`)
      
      return;
      },

    },

   
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
