<template>
<BreezeAuthenticatedLayout>
 <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-3 bg-blueish border-b border-gray-200"><strong>{{$page.props.patient.name}}</strong>'s Sessions & Notes
          </div>
        </div>
        <br>
        <div class="grid grid-cols-2">
        <div class="justify-self-start ml-2">
            <a
              :href="`/patients/${$page.props.patient.id}`"
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
              >Back to {{$page.props.patient.name}} </a
            >

        </div>
          
          <span class="justify-self-end">
                <div>
                <BreezeButton>
                        <a :href="route('sessions_create', `${$page.props.patient.id}`)" method="get">New Session</a></BreezeButton>
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
                Keywords
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Rate & Payment
              </th>
              <th v-if="$page.props.notes != null" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Notes
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
               <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <span v-if="session.note != null && session.note.isImportant == 0">
                  {{session.note.title}}
                </span>
                <span v-if="session.note != null && session.note.isImportant == 1" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700">
                (!) {{ session.note.title}}
                </span>
              </td>
             <td>
                 <BreezeButton class="bg-yellow-400 text-white hover:bg-yellow-500 active:bg-blue-400"><a :href="`/patients/${session.patient_id}/sessions/${session.id}`" method="get">View</a></BreezeButton>
              </td>
               <td>
                 <BreezeButton class="bg-green-400 text-white hover:bg-green-500 active:bg-blue-400"><a :href="`/patients/${session.patient_id}/sessions/${session.id}/edit`" method="get">Edit</a></BreezeButton>
              </td>
            <td>
                <BreezeButton class="bg-red-400 hover:bg-red-500" @click.prevent="deleteSession(`${session.patient_id}`, `${session.id}`)">Delete</BreezeButton>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
        </div>
        </div>
          </div>
        <br>      
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
    deleteSession(id, sId) {
      if(confirm('Are you sure you want to delete this session?')) {
      this.$inertia.delete(`/session/${sId}`, id)
      }
      return;
      },
   }
};
</script>
<style scoped>
.bg-blueish {
  background-color: rgb(112, 202, 200);
}


</style>
