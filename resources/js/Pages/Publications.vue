<template>
    <Head title="Publications" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                </div>
                </div>

                 <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full text-center pb-8">
                        
        
            <h1 class="font-bold text-3xl font-heading text-gray-900 pb-2">
                EXPERIMENTAL DEVELOPMENT ZONE
            </h1>
            <br>
            
            <p class="text-gray-500 font-normal text-base"> 'The Real is that which resists symbolization absolutely'</p>
            <p class="text-gray-500 font-normal text-base"> (Jacques Lacan)</p>
        </div>
        </div>
        </div>

         <br>
         
          <div class="flex justify-center items-center">
          
                <BreezeButton>
                        <a :href="route('patients_create')" method="get">New Publication</a></BreezeButton>
         
          </div>
          
      

        <br />

        <div
          v-if="$page.props.publications.length != 0"
          class="bg-gray-300 dark:bg-light_secondary rounded-lg py-5 px-5"
        >
         
          <br />
          <div class="grid grid-cols-3 px-10 gap-2">
            <span
              v-for="publication in $page.props.publications"
              v-bind:key="publication"
            >
              <span class="flex justify-center items-center">
                 <a class="cursor-pointer" :href="`/publications/${publication.id}`">
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
                      <img :src="`${publication.image}`" alt="Publication cover" style="width:50%; border-radius:5px" />
                    </div>
                   
                     
                  
                  </div>
                  </a>
                   


             
              </span>

              <br>
                
              <div class="grid justify-items-center mb-2">
         <h2 class="font-semibold text-m text-gray-800"> Title: '{{publication.title}}'</h2>
               <p class="font-light text-sm"> Author: {{publication.author}} </p>
               <BreezeButton class="bg-red-400 hover:bg-red-500 mt-2" @click.prevent="deletePublication(`${publication.id}`)"> Delete </BreezeButton>   
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
import { Head } from '@inertiajs/inertia-vue3';


export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton
    },

    methods: {
      deletePublication(id) {
         this.$inertia.delete(`/publications/${id}`)
      
      return;
      }
    },

   
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
