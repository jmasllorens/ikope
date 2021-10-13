<template>
  <Head title="Patients" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-3 bg-blueish border-b border-gray-200">Patients</div>
        </div>
        <br />
     
        <div class="grid grid-cols-2">
          <div v-if="$page.props.patients != null && $page.props.sessionsU.length != 0" class="justify-self-start ml-2">
            <a
              href="/sessions"
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
              >All <strong> &nbsp;{{ $page.props.auth.user.name }} </strong>'s Sessions & Notes</a
            >
          </div>
          <div v-if="$page.props.sessionsU.length == 0" class="justify-self-start">
           </div>
   
         
         
          <div class="justify-self-end">
          
                <BreezeButton>
                        <a :href="route('patients_create')" method="get">New Patient</a></BreezeButton>
         
          </div>
          
        </div>

        <br />

        <div
          v-if="$page.props.patients.length != 0"
          class="bg-gray-300 dark:bg-light_secondary rounded-lg py-5 px-5"
        >
         
          <br />
          <div class="grid grid-cols-3 px-10 gap-2">
            <span
              v-for="patient in $page.props.patients"
              v-bind:key="patient"
            >
              <span class="flex justify-center items-center">
                <a class="cursor-pointer" :href="`/patients/${patient.id}`">
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
                        p-2
                        bg-white
                        rounded-lg
                        shadow-xl
                        w-32
                      "
                      style="border-radius:20rem;"
                    >
                      <img v-if="patient.isConsulting" src="@/Assets/divan.jpeg" alt="divan" style="border-radius:45rem" />
                      <svg v-if="!patient.isConsulting" class="w-7 h-7 mt-10 mb-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                   
                     
                  
                  </div>
                   

                </a>
             
              </span>

              <br>
                
              <div class="grid justify-items-center mb-2">
               <a class="cursor-pointer" :href="`/patients/${patient.id}`">   <h2 class="font-semibold text-m text-gray-800">{{patient.name}}</h2></a>
               <p class="font-light text-sm">{{patient.sessions.length}} sessions | {{patient.notes.length}} notes </p>    
            </div>
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