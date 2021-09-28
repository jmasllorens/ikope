<template>
    <Head title="MySeminars" />

    <BreezeAuthenticatedLayout>
   
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Seminars
                 
            </div>
                  </div>
                  <br>
                   <div class="justify-self-start ml-2">
                     <a
              href="/seminars"
              method="get"
              class="
                inline-flex
                items-center
                px-1
                pt-1
                border-b-2 border-transparent
                text-sm
                font-medium
                leading-5
                text-gray-500
                hover:text-gray-700
                hover:border-gray-400
                focus:outline-none
                focus:text-gray-700
                focus:border-gray-400
                transition
                duration-150
                ease-in-out
              "
              >Back to Seminars</a
            >
                  </div>
           
              <br>    
    <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title & Subject
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Author/s
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Approach
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
             
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="seminar in $page.props.mySeminars" v-bind:key="seminar">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900" > {{ seminar.title }}</div>
                <div class="text-sm text-gray-500">{{ seminar.subject }} </div>
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ seminar.author }}</div>
             
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ seminar.approach }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                {{ seminar.date }}
              </td>   
        
        
              
              <td>
                 <BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500 active:bg-blue-400"><a :href="`/seminars/${seminar.id}`" method="get">View</a></BreezeButton>
              </td>
               <td>
                 <BreezeButton><a :href="`/unsubscribe/${seminar.id}`" method="get">Unsubscribe</a></BreezeButton>
              </td>
            

            
            
            </tr>
          
          </tbody>
        </table>
          </div>
                </div>


    </div>
  </div>
</div>
                </div>


        
 
</BreezeAuthenticatedLayout> 
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import BreezeButton from '@/Components/Button.vue';




export default {
  
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton  
    },

}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>