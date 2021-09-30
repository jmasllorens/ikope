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
           <div class="p-4 flex inline-block mt-3 mb-3">
               <svg class="w-6 h-6 mt-2 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
               <BreezeLabel for="search" class="mt-3 mr-3">Search</BreezeLabel>
               <BreezeInput id="search" type="text" v-model="term" @keyup="search"></BreezeInput>

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
                <div class="text-sm text-gray-900" > {{ user.name }}</div>
                <div class="text-sm text-gray-500">({{ user.pronoun }}) </div>
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ user.email }}</div>
                </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span v-if="user.isActive" class="px-2 inline-flex text-xs leading-5 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="35" height="35"
viewBox="0 0 172 172"
style="fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#70c8ca"><path d="M31.53333,22.93333c-7.91608,0 -14.33333,6.41725 -14.33333,14.33333c0,7.91608 6.41725,14.33333 14.33333,14.33333c7.91608,0 14.33333,-6.41725 14.33333,-14.33333c0,-7.91608 -6.41725,-14.33333 -14.33333,-14.33333zM57.33333,51.6c-6.33287,0 -11.46667,5.1338 -11.46667,11.46667c0.0061,3.19567 1.3455,6.24382 3.69531,8.40964c0.32326,0.29929 0.66349,0.5797 1.01901,0.83984l18.275,15.0836l0.06718,-0.0336c3.03376,2.68357 6.97414,4.36719 11.34349,4.36719h21.92552c0.77433,0.12992 1.5671,0.09943 2.32917,-0.08958c2.59409,-0.30077 5.00781,-1.478 6.84192,-3.33698l14.69167,-14.28854l25.59844,16.77448c2.55991,1.66277 5.97364,1.02944 7.76675,-1.44093c1.79311,-2.47037 1.3374,-5.91231 -1.0368,-7.83094l-28.66667,-22.93333c-1.05617,-0.84473 -2.37693,-1.28895 -3.72891,-1.25417c-1.11852,0.02758 -2.20453,0.3818 -3.12421,1.01901l-19.66354,10.44766h-21.66797l-15.75547,-13.47109l-0.03359,-0.03359c-2.16581,-2.34981 -5.21397,-3.68921 -8.40964,-3.69531zM20.06667,63.06667c-2.20088,0 -4.40347,0.83966 -6.08047,2.51953c-3.35973,3.35973 -3.35973,8.80694 0,12.16094l37.6138,37.6138v27.97239h17.2v-22.93333h74.53333v22.93333h17.2v-40.13333h-96.77239l-37.6138,-37.6138c-1.67987,-1.67987 -3.87959,-2.51953 -6.08047,-2.51953z"></path></g></g></svg>
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
        }
    }
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>