<template>
    <Head title="Patient" />

    <BreezeAuthenticatedLayout>
        <div class="py-9">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
  </div>
</div>


<div class="flex justify-center m-6">
     <div>
        <span v-if="$page.props.patient.sessions.length > 0" class="mb-3">
            <a
              :href="`/patients/${$page.props.patient.id}/sessions&notes`" 
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
              >Sessions & Notes</a
            >

          </span>
          <br>
            <span>
            <a
              :href="`/patients/${$page.props.patient.id}/sessions&notes/create`" 
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
              >New Session</a
            >

          </span>
          <br>
            <span>
            <a
              :href="`/patients/${$page.props.patient.id}/edit`" 
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
              >Edit Patient</a
            >

          </span>
         
              <!--  <div>  <BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500 active:bg-blue-400"><a :href="`/patients/${$page.props.patient.id}/sessions&notes`" method="get">View S&N</a></BreezeButton></div>
  <br>
                 <div>  <BreezeButton class="bg-green-400 hover:bg-green-500"><a :href="`/patients/${$page.props.patient.id}/sessions&notes/create`" method="get">New Session</a></BreezeButton></div>
          <br>
          
               <div><BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500"><a :href="`/patients/${$page.props.patient.id}/edit`" method="get">Edit Patient</a></BreezeButton></div>
         -->
           <br>
         <!--    <div><BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500"> <a :href="`/patients/${$page.props.patient.id}/edit`" method="get"> File Patient</a></BreezeButton></div>
            <br> -->
                <div class="mt-12"><BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deletePatient(`${$page.props.patient.id}`)">Delete Patient</BreezeButton></div></div>
  <div class="flex flex-col h-full w-4/5 mx-auto bg-blueish rounded-lg">
      
          <div class="flex justify-between -mt-4 px-4">
            <span v-if="$page.props.patient.isConsulting == 1"
              class="inline-block ring-2 bg-gray-700 ring-gray-700 rounded-sm text-m font-medium tracking-wide text-white py-1.5 px-3 pt-1.5"
              >Active</span>

             <span v-if="$page.props.patient.isConsulting == 0"
              class="inline-block ring-2 bg-yellow-300 ring-yellow-300 rounded-sm text-m tracking-wide font-bold text-gray-800 py-1.5 px-3 pt-1.5"
              >Filed</span>
            <span
              class="flex h-min space-x-1 items-center rounded-full bg-gray-700 py-2 px-3 text-m font-medium">
               <p class="text-white font-semibold text-sm">
                {{$page.props.patient.sessions.length }} sessions | {{ $page.props.patient.notes.length }} notes
              </p>
            </span>
          </div>
          <div class="py-2 px-4">
            <br>
            <h1
              class="text-xl font-medium leading-6 tracking-wide text-black">
            {{$page.props.patient.name}} 
            </h1>
            <p class="text-gray-700"> ({{$page.props.patient.pronoun}}) </p>
          </div>
          <div class="flex flex-row items-end h-full w-full px-4 mt-4">
            <div class="flex border-t border-gray-700 w-full py-4">
                <div class="">
                    <p class="text-m font-semibold">Mail:</p>
                  <p class="text-m font-light tracking-wider text-gray-700">
                  {{$page.props.patient.email}}
                  </p> 
                   <p class="text-m font-semibold">Age:</p>
                  <p class="text-m font-light tracking-wider text-gray-700">
                      {{$page.props.patient.age}}
                  </p>
                  <br>
                   <p class="text-m font-semibold">Motive of consultation:</p>
                   <p class="text-m font-light tracking-wide text-gray-700">
                   {{ $page.props.patient.motive }}
                  </p> 
                     <p class="text-m font-semibold">{{$page.props.patient.name}}'s History:</p>
                   <p class="text-m font-light tracking-wide text-gray-700">
                   {{ $page.props.patient.history }}
                  </p> 
                  <br>
           
                 <div class="text-m font-semibold">
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
            </div>
                </div>
              </div>
              <div>
                
               <!--  <BreezeButton  v-if="$props.seminar.users.length < $props.seminar.availability && !isSubscribed && !$props.auth.user.isAdmin"><a :href="`/subscribe/${seminar.id}`" method="get">Subscribe</a></BreezeButton>

                <BreezeButton v-if="isSubscribed && !$props.auth.user.isAdmin"><a :href="`/unsubscribe/${seminar.id}`" method="get">Unsubscribe</a></BreezeButton>

                <div v-if="$props.auth.user.isAdmin" class="inline-flex">
                <BreezeButton class="bg-green-700 hover:bg-green-800 mr-3"><a :href="`/seminars/${seminar.id}/edit`" method="get">Edit</a></BreezeButton>

                <BreezeButton class="bg-red-700 hover:bg-red-800 mr-3" @click.prevent="deleteSeminar(`${seminar.id}`)">Delete</BreezeButton> 
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