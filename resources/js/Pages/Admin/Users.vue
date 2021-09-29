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
           ------
           <div class="p-4">
               <label for="search" class="mb-3">Search</label>
               <input id="search" type="text" v-model="term" @keyup="search">

           </div>

            <tr v-for="user in users.data" v-bind:key="user">
                <th>
                    Name:&nbsp;
                </th>
                <td>{{user.name}} ({{user.pronoun}})</td>
                <th>
                    &nbsp;&nbsp;&nbsp;Email:&nbsp;
                </th>
                <td>{{user.email}}</td>
                 <th>
                    &nbsp;&nbsp;&nbsp;Patients Section:&nbsp;
                </th>
                <td v-if="user.isActive">Yes</td>
                <td v-if="!user.isActive">No</td>
            </tr>

   <pagination class="mt-6" :links="users.links" />
------
    </div>
  
    
        </div>
      </BreezeAuthenticatedLayout>
    

</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination.vue'
import BreezeLabel from '@/Components/Label.vue'
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