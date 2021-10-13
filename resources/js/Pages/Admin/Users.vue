<template>
    <Head title="Users" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Users
                    </div>
                </div>
           <div class="p-4 flex inline-block mt-3 mb-3 justify-between">
               <div class="flex ml-2">
                     <a
              href="/adminusers"
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
              >Admin Users</a
            ></div>
            <div class="flex inline-block">
               <svg class="w-6 h-6 mt-2 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
               <BreezeLabel for="search" class="mt-3 mr-3">Search</BreezeLabel>
               <BreezeInput class="mr-12" id="search" type="text" v-model="term" @keyup="search"></BreezeInput>
              </div>
                <BreezeButton class="bg-red-400 hover:bg-red-500 mr-4" @click.prevent="deleteAll()">Delete All</BreezeButton>

           </div>
  
 <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
   
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date of Registration
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="user in users.data" v-bind:key="user">
                <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.id }}</div>
                </td>
                 <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.created_at }}</div>
                </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900" > {{ user.name }}</div>
                <div class="text-sm text-gray-500">({{ user.pronoun }}) </div>
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.email }}</div>
                </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span v-if="user.isActive" class="px-2 inline-flex text-xs leading-5 font-semibold">
                    <svg class="mr-2" height="30" viewBox="0 -46 512 512" width="30" xmlns="http://www.w3.org/2000/svg"><path d="m392 120c0-39.28125 30.359375-71.582031 68.84375-74.726562-11.535156-26.609376-38.046875-45.273438-68.84375-45.273438-55.890625 0-84.179688 34.820312-109.140625 65.539062-23.746094 29.222657-44.25 54.460938-85.859375 54.460938h-77c-30.691406 0-57.121094 18.539062-68.71875 45h340.71875zm0 0"/><path d="m392 195h-347c-24.851562 0-45 20.148438-45 45v30h392zm0 0"/><path d="m467 75c-24.851562 0-45 20.148438-45 45v150h60v-114.203125c17.476562-4.203125 30-16.203125 30-35.796875 0-24.851562-20.148438-45-45-45zm0 0"/><path d="m452 390h30v30h-30zm0 0"/><path d="m0 300h482v60h-482zm0 0"/><path d="m0 390h30v30h-30zm0 0"/></svg>
                </span>
                <span v-if="!user.isActive" class="px-2 inline-flex text-xs leading-5 font-semibold">
               <img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/>
                </span>
              </td>
              <td>
                <BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deleteUser(`${user.id}`)">Delete</BreezeButton>
              </td>
            
            
            </tr>
          
          </tbody>
        </table>
          </div>
                </div>

   <pagination class="mt-6" :links="users.links" />

    </div>
  
    
        </div>
      </BreezeAuthenticatedLayout>
    

</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeButton from '@/Components/Button.vue'
import BreezeInput from '@/Components/Input.vue';


export default {
    props: {
        users: Object
    },
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Pagination,
        BreezeLabel,
        BreezeButton,
        BreezeInput
        
    },
    data() {
        return {
            term: '',
         
  
        }
    },
    methods: {
        search() {
            this.$inertia.get(route('users', {term: this.term}))
        },
         deleteUser(id) {
       if(confirm('Are you sure you want to delete this user?')) {
      this.$inertia.delete(`/users/${id}`)
      }
      return;
      },

      deleteAll() {
       if(confirm('Are you sure you want to delete all users?')) {
      this.$inertia.delete(`/users`)
      }
      return;
      },
    }
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>