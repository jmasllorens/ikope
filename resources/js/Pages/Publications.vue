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
                        <a :href="route('publications_create')" method="get">New Publication</a></BreezeButton>
         
          </div>
          
      

        <br />

        <div
          v-if="$page.props.publications.total != 0"
          class="bg-gray-300 dark:bg-light_secondary rounded-lg py-5 px-5"
        >
         
          <br />
          <div class="grid grid-cols-3 px-10 gap-2">
            <span
              v-for="publication in $page.props.publications.data"
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
                      <img :src="`${publication.image}`" alt="Publication cover" style="width:75%; border-radius:5px" />
                    </div>
                   
                     
                  
                  </div>
                  </a>
                   


             
              </span>

              <br>
                
              <div class="grid justify-items-center mb-2 ml-11 mr-11">
              
      <!--    <h2 class="font-semibold text-m text-gray-800"> Title: '{{publication.title}}'</h2> -->
      
           <BreezeInput @change="changeTitle(publication.title)" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" max="100" type="text" v-model="publication.title" />
             <div class=" flex inline-block justify-between mt-2">
          <span @click.prevent="updatePublication(publication.id)" class="mr-2"><img class="cursor-pointer" src="https://img.icons8.com/ios-glyphs/30/000000/save--v2.png"/></span>
          <span @click.prevent="deletePublication(`${publication.id}`)" class="ml-2"> <svg class="w-7 h-7 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> </span>  </div> 
              
            </div>
      
            <br>
            </span>
            </div>
        </div>
    </div>


 <pagination class="mt-6" :links="publications.links" /> 
      
    </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeButton from '@/Components/Button.vue'
import BreezeInput from '@/Components/Input.vue'
import { Head } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination'


export default {
    props: ['publications'],
    
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,
        Pagination
    },

    data() {
    return {
     
      publicationTitle: '',
      updatedTitle: ''
      
    }
  },

    methods: {
      deletePublication(id) {
         this.$inertia.delete(`/publications/${id}`)
      
      return;
      },

       changeTitle(publicationTitle) {
      this.updatedTitle = publicationTitle
    }, 
      updatePublication(id) {
        let data = {
        title: this.updatedTitle
      }
      this.$inertia.patch(`/publications/${id}/update`, data)

      }
    },

   
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
