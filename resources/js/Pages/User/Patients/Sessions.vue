<template>
<BreezeAuthenticatedLayout>
<div>
     <h1>Sessions</h1>
   <span v-for="session in $page.props.patient.sessions" v-bind:key="session" class="text-m font-light tracking-wider text-gray-600">
    <p> {{session.id}} | {{session.date}} | {{session.cost}} | {{session.isPayed}}
        | {{session.keywords}}  </p>

      


    </span>
  <h2>Notes</h2>
     <span v-for="note in $page.props.patient.notes" v-bind:key="note" class="text-m font-light tracking-wider text-gray-600">
         
        <p> {{note.id}}  {{note.title}} | {{note.isImportant}} </p>
    </span>


	

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

.table {
		border-spacing: 0 15px;
	}

	i {
		font-size: 1rem !important;
	}

	.table tr {
		border-radius: 20px;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}

</style>
