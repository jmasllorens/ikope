<template>
    <Head title="Admin Users" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Admin Users
                    </div>
                </div>
                <br>
  
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
                <span v-if="!user.isActive && !user.isAdmin" class="px-2 inline-flex text-xs leading-5 font-semibold">
               <img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/>
                </span>
                 <span v-if="user.isAdmin" class="px-2 inline-flex text-xs leading-5 font-semibold">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                     </span>
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