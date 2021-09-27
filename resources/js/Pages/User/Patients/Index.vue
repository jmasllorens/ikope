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
                        p-4
                        bg-white
                        ring-2 ring-white
                        rounded-lg
                        shadow-xl
                        w-32
                      "
                    >
                      <img src="@/Assets/ikFile.jpeg" alt="file" />
                    </div>
                   
                     
                  
                  </div>
                   

                </a>
             
              </span>

              <br>
                
              <div class="grid justify-items-center mb-2">
               <a class="cursor-pointer" :href="`/patients/${patient.id}`">   <h2 class="font-semibold text-sm text-gray-800 uppercase">{{patient.name}}</h2></a>
               <p>{{patient.sessions.length}}</p>
                <p>{{patient.notes.length}}</p> 
              
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