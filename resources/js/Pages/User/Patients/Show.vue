<template>
    <Head title="Patient" />

    <BreezeAuthenticatedLayout>
        <div class="py-9">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  
            </div>
               <span v-if="$page.props.patient.sessions.length > 0" class="-ml-10">
            <a
              :href="`/patients/${$page.props.patient.id}/sessions`" 
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
              ><strong>{{$page.props.patient.name}}</strong>'s Sessions & Notes</a
            >

          </span>
         
</div>
    <div class="flex justify-center">

   <h1
              class="text-xl font-medium leading-6 tracking-wide text-black">
            {{$page.props.patient.name}} 
            </h1>
            <p class="text-gray-700"> &nbsp;&nbsp;({{$page.props.patient.pronoun}}) </p>
  </div>
<div class="flex justify-center m-9">
     <div class="mr-12">
     
         <div class="mt-15"><BreezeButton class="bg-green-400 hover:bg-green-500"> <a :href="`/patients/${$page.props.patient.id}/sessionscreate`" method="get">New Session</a></BreezeButton></div>
           <br>
         
         <div><BreezeButton class="bg-yellow-400 hover:bg-yellow-500"> <a :href="`/patients/${$page.props.patient.id}/edit`" method="get"> Edit Patient</a></BreezeButton></div>
           <br>
  
                <div><BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deletePatient(`${$page.props.patient.id}`)">Delete Patient</BreezeButton></div></div>
    
          
        
           
    
         

            <div class="flex border-t border-gray-700 w-full py-4 mr-12">
               
                <div class="">
                  <div class="flex justify-between">
                  <span v-if="$page.props.patient.isConsulting == 1" class="flex inline-block"><svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg><p class="mt-2">&nbsp;&nbsp;Consulting</p></span>

             <span v-if="$page.props.patient.isConsulting == 0" class="flex inline-block"><svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg><p class="mt-2">&nbsp;&nbsp;Filed</p></span>
        
            <span
              class="inline-block h-min space-x-1 items-center rounded-full bg-gray-700 py-2 px-3 text-m font-medium">
               <p class="text-white font-semibold text-sm">
                {{$page.props.patient.sessions.length }} sessions | {{ $page.props.patient.notes.length }} notes
              </p>
            </span>
            </div>
            <br>
            <br>
            <div class="grid grid-cols-3">
               <div class="">
                    <p class="text-m"><strong>Reason for consultation:</strong>&nbsp;       {{$page.props.patient.motive}}</p>
              </div>
              <div class="">
                    <p class="text-m"><strong>Mail:</strong>&nbsp;       {{$page.props.patient.email}}</p>
              </div>
               <div class="">
                    <p class="text-m"><strong>Age:</strong>&nbsp;        {{$page.props.patient.age}}</p>
              </div>
                  
                  <br>
                  <br>
                  </div>
                  <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                     <p class="text-m font-bold  mr-5 ml-5 ">History:</p>
                     <br>
                  
                   <p class="text-ms font-light text-gray-800 mr-5 ml-5 leading-loose ">
                   {{ $page.props.patient.history }}
                  </p> 
                  <br>
                  </div>
           
                <!--  <div class="text-m font-semibold">
                  <h2>Sessions</h2>
                  <br>
                
         
          <span v-for="session in $page.props.patient.sessions" v-bind:key="session" class="text-m font-light tracking-wider text-gray-600">
              <p> Session number: {{ session.id}} </p>
                      <p> Session date: {{ session.date }} </p>
                       <p> Session keyword: {{ session.keywords }} </p>
                         <p> Session cost: {{ session.cost }} (is payed: {{ session.isPayed }}) </p>
                      
                        <br>
                    </span>
            
            </div>
             <div class="text-m font-semibold">
                  <h2>Notes</h2>
                  <br>
                
         
          <span v-for="note in $page.props.patient.notes" v-bind:key="note" class="text-m font-light tracking-wider text-gray-600">
              <p> Note number: {{ note.id}} </p>
                      <p> Note title: {{ note.title }} </p>
                       <p> Note importance: {{ note.isImportant }} </p>
                         <p> Note body: {{ note.text }}  </p>
                        <br>
                    </span>
            </div> -->
                </div>
       
          </div>
  
        </div>
       
</div>
<br>
<br>

</BreezeAuthenticatedLayout>
    
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import BreezeButton from '@/Components/Button.vue';




export default {
    
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,   
    },

    methods: {
    deletePatient(id) {
      if(confirm('Are you sure you want to delete this patient?')) {
      this.$inertia.delete(`/patients/${id}`, id)
      }
      return;
      }
    }

}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>