<template>
    <Head title="Patients" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-yellow-100 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Patients
                    </div>
                </div>
                <br>
                <div>
                    <span class="flex items-center justify-start mt-3 ml-5">
                        <span class="flex items-center mr-10">
                <a href="/sessions" method="get" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-m font-medium leading-5 text-gray-700 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out" style="margin-right: 5rem">All sessions</a>
                    </span>
                     <span class="flex items-center mr-10">
                 <a href="/notes" method="get" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-m font-medium leading-5 text-gray-700 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">All notes</a>
                    </span>
                    
                </span>
            
    </div>
                <br>
<div v-if="$page.props.auth.user.patients.length != 0" class="bg-gray-100 dark:bg-light_secondary rounded-lg py-5 px-5">

     <span class="flex items-center justify-end">
                 <BreezeButton class="p-3 mr-10 mt-5 mb-5">New Patient</BreezeButton>
                </span>
                <br>

	<div class="grid grid-rows-1 gap-5 text-white">
        
           
       
		<div class="row-span-1">
<span v-for="patient in $page.props.auth.user.patients"  v-bind:key="patient">
			<div class="grid grid-cols-3 px-10 gap-2">
				<div class="flex justify-center items-center">
                   
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">

   <div class="bg-blueish pt-1 px-2 rounded-xl shadow-lg w-52">
            <div class="flex justify-center">
                <div class="flex justify-center p-4 bg-blueish ring-2 ring-indigo-200 rounded-lg shadow-xl w-32" >
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="p-4">
              <div class="text-black text-sm">
                    <a :href="`/patients/${patient.id}`" method="get"> <h2> <strong>{{ patient.name }} ({{patient.pronoun}}) </strong> </h2>
                    <p>{{ patient.age }} years old</p>
                    <br>
                    <p> Motive: {{ patient.motive}} </p>

                    </a>       
                       
                        </div>
                <div class="flex justify-between mt-2">
                    <p class="text-gray-200"> </p>
                    <p class="text-white" ></p>
                </div>
            </div>
        </div>





						</div>
					</a>
				</div>


				<div v-if ="patient.sessions.length != 0" class="flex justify-center items-center">
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">

 <!-- Start Card -->
        <div class="bg-blueish pt-1 px-2 rounded-xl shadow-lg w-52">
            <div class="flex justify-center">
                <div class="flex justify-center p-4 bg-blueish ring-2 ring-indigo-200 rounded-lg shadow-xl w-32" >
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="p-4">
               <div class="h-30 rounded-lg text-black">
                    <a :href="`/patients/${patient.id}/sessions`" method="get"> <h2> Sessions:  {{ patient.sessions.length }}</h2>
                    </a>    
						</div>
                <div class="flex justify-between mt-2">
                    <p class="text-gray-200"> </p>
                    <p class="text-white" ></p>
                </div>
            </div>
        </div>
        <!--End Card -->



							
                        </div>
					</a>
				</div>
				<div v-if ="patient.sessions.length != 0" class="flex justify-center items-center">
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">
							
                             <!-- Start Card -->
        <div class="bg-blueish pt-1 px-2 rounded-xl shadow-lg w-52">
            <div class="flex justify-center">
                <div class="flex justify-center p-4 bg-blueish ring-2 ring-indigo-200 rounded-lg shadow-xl w-32" >
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="p-4">
               <div class="h-30 rounded-lg text-black">
                    <a :href="`/patients/${patient.id}/notes`" method="get"> <h2>  Notes: {{ patient.notes.length }}  </h2></a>    
						</div>
                <div class="flex justify-between mt-2">
                    <p class="text-gray-200"> </p>
                    <p class="text-white" ></p>
                </div>
            </div>
        </div>
        <!--End Card -->




						</div>
					</a>

            

                    </div>
                     </div>
                        
              
                     <br>
                 <hr style="margin-bottom: 2rem; margin-top:2 rem">
                     </span>
                

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
import BreezeButton from '@/Components/Button.vue'
import { Link } from '@inertiajs/inertia-vue3';
import BreezeNavLink from '@/Components/NavLink.vue'


export default {

    props: ['active'],

    computed: {
        classes() {
            return this.active
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-m font-medium leading-5 text-gray-900 text-semibold focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-m font-medium leading-5 text-gray-700 hover:text-gray-900 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
        }
    },

    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeNavLink,
        Link
    },
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}

</style>