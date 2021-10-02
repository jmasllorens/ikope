<template>
    <Head title="Subscribers" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        '{{$page.props.seminar.title}}' Seminar Subscribers
                    </div>
                </div>
                <br>
  
 <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div v-if="users.length == 0">There are no subscribers yet!
          </div>
   
      <div v-if="users.length > 0" class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
       
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
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
            <tr v-for="user in users" v-bind:key="user">
                <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.id }}</div>
                </td>
    
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900" > {{ user.name }}</div>
                <div class="text-sm text-gray-500">({{ user.pronoun }}) </div>
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.email }}</div>
                </td>
             
              
            
            
            </tr>
          
          </tbody>
        </table>
          </div>
                </div>


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
      this.$inertia.delete(`/adminusers/${id}`)
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