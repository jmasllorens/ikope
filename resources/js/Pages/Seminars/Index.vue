<template>
    <Head title="Seminars" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Seminars     
            </div>
                  </div>
                  
                  <br>
                  <div class="grid grid-cols-2">
                    <div v-if="$page.props.auth.user.isAdmin == false && $page.props.auth.user.seminars.length > 0" class="justify-self-start ml-2">
                     <a
              href="/myseminars"
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
              ><strong>{{ $page.props.auth.user.name }}</strong>'s Seminars</a
            >
                  </div>

              <div v-if="$props.auth.user.isAdmin" class="justify-self-start"></div>
              
              <div v-if="$props.auth.user.isAdmin" class="justify-self-end">
                 <BreezeButton>
                        <a :href="route('seminars_create')" method="get">Create</a></BreezeButton>
              </div>
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
                Available Places
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
               <th v-if="$props.auth.user.isAdmin" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
            
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="seminar in $page.props.seminars" v-bind:key="seminar">
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
                  <span v-if="seminar.date > currentTime">
                {{ seminar.date }} 
                  </span>
                  <span v-if="seminar.date < currentTime" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700">Expired
                  </span>
              </td>
              <td v-if="!$page.props.auth.user.isAdmin && seminar.date < currentTime" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                </td>
              
              <td v-if="!$page.props.auth.user.isAdmin" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span v-if="seminar.users.length >= seminar.availability && seminar.date > currentTime" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700">
                  Full
                </span>
                <span v-if="seminar.users.length < seminar.availability && seminar.date > currentTime" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700">
                {{ seminar.availability - seminar.users.length }}/{{seminar.availability}}
                </span>
              </td>
              <td v-if="$page.props.auth.user.isAdmin" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span v-if="seminar.users.length >= seminar.availability && seminar.date > currentTime" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700">
                 <a :href="`/seminars/${seminar.id}/subscribers`" method="get">Full</a>
                </span>
                <span v-if="seminar.users.length < seminar.availability && seminar.date > currentTime" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700"><a :href="`/seminars/${seminar.id}/subscribers`" method="get">
                {{ seminar.availability - seminar.users.length }}/{{seminar.availability}}</a>
                </span>
              </td>
              <td v-if="!$props.auth.user.isAdmin && seminar.date > currentTime">
                 <BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500 active:bg-blue-400"><a :href="`/seminars/${seminar.id}`" method="get">+ Info</a></BreezeButton>
              </td>
               
               <td v-if="!$props.auth.user.isAdmin">
               
              </td>
              
              <td v-if="$props.auth.user.isAdmin">
                 <BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500 active:bg-blue-400"><a :href="`/seminars/${seminar.id}`" method="get">View</a></BreezeButton>
              </td>
              <td v-if="$props.auth.user.isAdmin">
               <BreezeButton class="bg-green-400 hover:bg-green-500"><a :href="`/seminars/${seminar.id}/edit`" method="get">Edit</a></BreezeButton>
              </td>
              <td v-if="$props.auth.user.isAdmin">
                <BreezeButton class="bg-red-400 hover:bg-red-500 mr-2" @click.prevent="confirmDelete(`${seminar.id}`)">Delete</BreezeButton>
              </td>
              <td v-if="confirm" class="absolute flex max-w-xs w-full top-0 right-0 mt-4 mr-16  bg-white rounded shadow p-4 bg-red-100">
                    <div class="mr-3 ml-2">
                        <svg class="w-6 h-6 text-red-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                     <div class="flex-1 text-gray-800 text-sm"> Are you sure you want to delete this seminar?
                  
                         <div class="grid grid-cols-2 mt-5 ml-10">
                          <div><button @click.prevent="deleteSeminar(id)" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-500">Accept</button>
                    </div>
                         <div> <button @click.prevent="confirm = false" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-500">Cancel</button>
                             </div>
                             </div>
                      
                    </div>
                    
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
  
    props: ['seminars', 'auth', 'users', 'userSubscribed'],
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton  
    },

    data() {
    return {
        currentTime: '',
        confirm: false,
        id: ''
    }
   },
    created(){
      setInterval(this.getNow, 1000)
    },
  

    methods: {

      getNow: function() {

                    const today = new Date();
                    const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    const dateTime = date +' '+ time;
                    this.currentTime = dateTime;

                },

    
    confirmDelete(id)
    {
      this.confirm = true,
      this.id = id
    },
    
    deleteSeminar(id) {
      this.confirm = false
     
      this.$inertia.delete(`/seminars/${id}`)
      
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