<template>
    <Head title="Seminars" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-3 bg-blueish border-b border-gray-200">
                        <strong>Seminars</strong>
                    </div>
   <!--  <div class="flex justify-center pt-8" v-if="message">
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    </div> -->
    <!-- TABLE -->
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
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="seminar in seminars.data" v-bind:key="seminar">
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
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ seminar.date }}
              </td>
              <td>
                 <BreezeButton class="bg-blue-200 text-gray-800 hover:bg-blue-300 active:bg-blue-400"><a :href="`/seminars/${seminar.id}`" method="get">Info</a></BreezeButton>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <BreezeButton class="bg-blue-200 text-gray-800 hover:bg-blue-300 active:bg-blue-400"><a :href="`/subscribe/${seminar.id}`" method="get">Subscribe</a></BreezeButton>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <BreezeButton class="bg-blue-200 text-gray-800 hover:bg-blue-300 active:bg-blue-400"  ><a :href="`/unsubscribe/${seminar.id}`" method="get">Unsubscribe</a></BreezeButton>
              </td>
            </tr>
            <!-- More people... -->
          </tbody>
        </table>
      </div>
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
    props: ['seminars'],

    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,   
    },

}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>