<template>
     <h1>Sessions</h1>
   <span v-for="session in $page.props.patient.sessions" v-bind:key="session" class="text-m font-light tracking-wider text-gray-600">
    <p> {{session.id}} | {{session.date}} | {{session.cost}} | {{session.isPayed}}
        | {{session.keywords}}  </p>

      


    </span>
  <h2>Notes</h2>
     <span v-for="note in $page.props.patient.notes" v-bind:key="note" class="text-m font-light tracking-wider text-gray-600">
         
        <p> {{note.id}}  {{note.title}} | {{note.isImportant}} </p>
    </span>
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
