<template>
  <Head title="Sessions&Notes" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-3 bg-blueish border-b border-gray-200"><strong>{{ $page.props.auth.user.name }}</strong>'s Sessions & Notes
          </div>
        </div>
        <br />
        <div class="grid grid-cols-2">
          <span class="justify-self-start ml-2">
            <a
              href="/patients"
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
              >Back to Patients</a
            >
          </span>

          
          <span class="justify-self-end">
                <div>
                <BreezeButton>
                        <a :href="route('patients')" method="get">New Session</a></BreezeButton>
                </div>
          </span>
          
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
                Date
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Patient Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Session Number
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Keywords
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Rate & Payment
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr  v-for="session in $page.props.sessions"
              v-bind:key="session">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900" > {{ session.date }}</div>
          
              </td>
               <td class="px-6 py-4 whitespace-nowrap text-sm">
                <div class="text-sm text-gray-900"><a class="cursor-pointer text-gray-500" :href="`/patients/${session.patient.id}/`">{{ session.patient.name }}</a></div>
             
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ session.id }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                {{ session.keywords }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span v-if="session.isPayed == 0" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700">
                  {{session.cost}} € pending
                </span>
                <span v-if="session.isPayed == 1" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700">
                {{ session.cost}} € payed
                </span>
              </td>
             <td>
                 <BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500 active:bg-blue-400"><a :href="`/patients/${session.patient.id}/sessions&notes/${session.id}`" method="get">View</a></BreezeButton>
              </td>
              <td>
                <BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deleteSession(`${session.id}`)">Delete</BreezeButton>
              </td> 
            
            
            </tr>
          
          </tbody>
        </table>
        </div>
        </div>
        </div>
          </div>

        <br />
  
        <div
          v-if="$page.props.sessions.length != 0"
          class="bg-gray-300 dark:bg-light_secondary rounded-lg py-5 px-5"
        >
        
         
          <br>
          <div class="grid grid-cols-3 px-10 gap-2">
            <span
              v-for="session in $page.props.sessions"
              v-bind:key="session"
            >

            
              <span class="flex justify-center items-center">
                <a class="cursor-pointer" :href="`/patients/${session.patient_id}/sessions&notes/${session.id}`">
                  <div
                    class="
                      hover:scale-105
                      transform
                      transition-all
                      duration-500
                    "
                  >
                    <!-- Start Card -->

                    <div
                      class="
                        flex
                        justify-center
                        bg-white
                        ring-1 ring-gray-200
                        rounded-lg
                    
                        w-32
                      "
                    >
                      <img src="@/Assets/divan.jpeg" alt="file" style="border-radius:10rem;" />
                    </div>
                   
                     
                  
                  </div>
                   

                </a>
             
              </span>

              <br>
                
              <div class="grid justify-items-center mb-2 text-sm">
                  <p>Session number: {{session.id}} </p>
                  <p>Patient: {{session.patient.name}} </p>
                  <p>Date: {{session.date}} </p>
                  <p>Keywords: "{{ session.keywords }}" </p>
                </div>
                <div class="grid justify-items-start ml-10"> 
               <div class="grid grid-cols-2">
                <div v-if="session.isPayed == 1" class="justify-self-start bg-gradient-to-br from-green-300 to-green-600 shadow-md hover:shadow-lg h-5 w-5 rounded-full"></div>
                <p v-if="session.isPayed == 1" class="justify-self-end">{{session.cost}} € payed </p>
                </div>
         
               <div class="grid grid-cols-2">
                <div v-if="session.isPayed == 0" class="justify-self-end bg-gradient-to-br from-red-300 to-red-600 shadow-md hover:shadow-lg h-5 w-5 rounded-full"></div>
                <p v-if="session.isPayed == 0" class="justify-self-start ml-2">{{session.cost}} € pending </p>
                </div>
                </div>
          
             
            
          
                  


               <!-- <a class="cursor-pointer" :href="`/patients/${session.patient_id}/sessions`">   <h2 class="font-semibold text-sm text-gray-800 uppercase">View Patient</h2></a>  -->
              
    
            <br>
            </span>
            
       
          </div>
        </div>

        
      </div>
      
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeNavLink from "@/Components/NavLink.vue";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeButton,
    BreezeNavLink,
  },
   methods: {
    deleteSssion(id) {
       if(confirm('Are you sure you want to delete this session?')) {
      this.$inertia.delete(`/seminars/${id}`, id)
      }
      return;
      }
    }
};
</script>
<style scoped>
.bg-blueish {
  background-color: rgb(112, 202, 200);
}

</style>