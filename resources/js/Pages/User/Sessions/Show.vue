<template>
    <Head title="Session" />

    <BreezeAuthenticatedLayout>
        <div class="py-9">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  
            </div>
               <span class="-ml-10">
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
         <strong>Session:</strong>&nbsp;&nbsp;{{$page.props.session.date}}
            </h1>
           
  </div>

     <div class="flex justify-center m-9">
<div class="mr-12">

     <div v-if="$page.props.session.note == null" class="mt-15"><BreezeButton class="bg-yellow-400 hover:bg-yellow-500 "> <a :href="`/patients/${$page.props.patient.id}/sessions/${$page.props.session.id}/edit`" method="get"> Edit Session</a></BreezeButton></div>

  <div v-if="$page.props.session.note != null"><BreezeButton class="bg-green-400 hover:bg-green-500 mt-15"> <a :href="`/patients/${$page.props.patient.id}/sessions/${$page.props.session.id}/edit`" method="get"> Edit Session</a></BreezeButton></div>
<br>
  <div><BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deleteSession(`${$page.props.patient.id}`)">Delete Session</BreezeButton></div>
<br><br><br>

  <div v-if="$page.props.session.note == null" class="mt-15"><BreezeButton class="bg-green-400 hover:bg-green-500 "> <a :href="`/patients/${$page.props.patient.id}/sessions/${$page.props.session.id}/create`" method="get"> Create Note</a></BreezeButton></div>
  <div v-if="$page.props.session.note != null"><BreezeButton class="bg-yellow-400 hover:bg-yellow-500"> <a :href="`/patients/${$page.props.patient.id}/sessions/${$page.props.session.id}/${$page.props.session.note.id}/edit`" method="get"> Update Note</a></BreezeButton></div>
     <br>
  <div v-if="$page.props.session.note != null"><BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deleteNote()">Delete Note</BreezeButton></div></div>
        
            <div class="flex border-t border-gray-700 w-full py-4 mr-12">  
                <div class="">
                  <div class="flex justify-between">
                      <span v-if="$page.props.session.isPayed == 1"
              class="inline-block ring-2 bg-gray-700 ring-gray-700 rounded-sm text-m font-medium tracking-wide text-white py-1.5 px-3 pt-1.5"
              >{{$page.props.session.cost}} € payed </span>

             <span v-if="$page.props.session.isPayed == 0"
              class="inline-block ring-2 bg-gray-700 ring-gray-700 rounded-sm text-m font-medium tracking-wide text-white px-3 mt-2"
              ><p class="p-1">{{$page.props.session.cost}} € pending</p></span>
                  
            <span v-if="$page.props.notes != null && $page.props.notes.isImportant == 0" 
              class="inline-block h-min space-x-1 items-center rounded-full text-m font-medium text-red-600">
              <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </span>
           
            
            </div>
            <br>
            <br>
            <div class="grid grid-cols-4">
               <div class="mr-12">
                    <p class="text-m"><strong>Keywords:</strong>&nbsp; {{$page.props.session.keywords}} </p>
              </div>
            <div class="ml-12  text-gray-100">-----------------------------------</div>
            <div class="ml-12 text-gray-100">...---......----...........................</div>
               <div class="ml-12 justify-self-end cursor-pointer"> <a :href="`/patients/${$page.props.patient.id}`" method="get">
                 <p class="text-m"><strong>Patient:</strong>&nbsp; {{$page.props.patient.name}} </p> </a>
                  </div> 
                  
             
                  <br>
                  </div>
                  <div v-if="$page.props.notes != null" class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                     <p class="text-m font-bold  mr-5 ml-5 ">{{$page.props.notes.title}}</p>
                     <br>
                  
                   <p class="text-ms font-light text-gray-800 mr-5 ml-5 ">
                   {{ $page.props.notes.text }}
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
<br><br>





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
    deleteSession(id) {
      if(confirm('Are you sure you want to delete this session?')) {
      this.$inertia.delete(`/session/${this.$page.props.session.id}`, id)
      }
      return;
      },

      deleteNote() {
        if(confirm('Are you sure you want to delete this note?')) {
          this.$inertia.delete(`/note/${this.$page.props.session.note.id}`)
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