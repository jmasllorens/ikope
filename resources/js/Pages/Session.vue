<template>
    <Head title="Session" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
  </div>
</div>

<div class="flex justify-between m-6">
  <div class="flex flex-col h-full w-4/5 mx-auto bg-blueish rounded-lg">
      
          <div class="flex justify-between -mt-4 px-4">
            <span v-if="$page.props.session.isPayed == 1"
              class="inline-block ring-2 bg-gray-700 ring-gray-700 rounded-sm text-m font-medium tracking-wide text-white py-1.5 px-3 pt-1.5"
              >{{$page.props.session.cost}} € payed</span>

             <span v-if="$page.props.session.isPayed == 0"
              class="inline-block ring-2 bg-yellow-300 ring-yellow-300 rounded-sm text-m tracking-wide font-bold text-gray-800 py-1.5 px-3 pt-1.5"
              >{{$page.props.session.cost}} € pending</span>
         <!--    <span
              class="flex h-min space-x-1 items-center rounded-full bg-gray-700 py-2 px-3 text-m font-medium">
                <a class="cursor-pointer" :href="`/patients/${$page.props.patient.id}/sessions&notes`">  <p class="text-white font-semibold text-sm">
                {{$page.props.patient.sessions.length }} sessions | {{ $page.props.patient.notes.length }} notes
              </p></a>
            </span> -->
          </div>
          <div class="py-2 px-4">
            <br>
            <h1
              class="text-xl font-medium leading-6 tracking-wide text-black">
            {{$page.props.session.keywords}} 
            </h1>
            <p class="text-gray-700"> ({{$page.props.session.date}}) </p>
          </div>
          <div class="flex flex-row items-end h-full w-full px-4 mt-4">
            <div class="flex border-t border-gray-700 w-full py-4">
                <div class="">
                   <!--  <p class="text-m font-semibold">Mail:</p>
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
                  <br> -->
           
                 <div class="text-m font-semibold">
                  <h2>Sessions</h2>
                  <br>
                
         
        <!--   <span v-for="session in $page.props.patient.sessions" v-bind:key="session" class="text-m font-light tracking-wider text-gray-600">
              <p> Session number: {{ session.id}} </p>
                      <p> Session date: {{ session.date }} </p>
                       <p> Session keyword: {{ session.keywords }} </p>
                         <p> Session cost: {{ session.cost }} (is payed: {{ session.isPayed }}) </p>
                      
                        <br>
                    </span> -->
            </div>
             <div class="text-m font-semibold">
                  <h2>Notes</h2>
                  <br>
                
         
         
              <p> Note number: {{ $page.props.session.note.id}} </p>
                      <p> Note title: {{$page.props.session.note.title}} </p>
                   
                        <br>
                  
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
        <br>
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
    deleteSession(id, sId) {
      if(confirm('Are you sure you want to delete this session?')) {
      this.$inertia.delete(`/patients/${id}/${sId}`, id, sId)
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