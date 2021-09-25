<template>
  <Head title="Sessions&Notes" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-3 bg-blueish border-b border-gray-200"><strong>{{ $page.props.auth.user.name }}</strong>'s Sessions & Notes</div>
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
                        <a :href="route('sessions_create')" method="get">New Session</a></BreezeButton>
                </div>
          </span>
          
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
                        ring-2 ring-white
                        rounded-lg
                    
                        w-32
                      "
                    >
                      <img src="@/Assets/ikDivan.jpeg" alt="file" style="border-radius:10rem;" />
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
};
</script>
<style scoped>
.bg-blueish {
  background-color: rgb(112, 202, 200);
}

</style>