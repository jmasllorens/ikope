<template>
<Head title="Edit" />

  <BreezeAuthenticatedLayout>
   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-blueish border-b border-gray-200">
                    <h2> Edit </h2>
                </div>
            </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="editPatient()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
                <div>
                <BreezeLabel for="name" value="Name"/>
                <BreezeInput v-model="form.name" id="name" type="text" class="mt-1 block w-full" placeholder="ex: 'Sigmund Freud'" required autofocus />
                </div>

                <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput v-model="form.email" id="email" type="email" class="mt-1 block w-full" placeholder="Enter your patient's email" required autofocus />
                </div>


                 <div>
                <BreezeLabel for="age" value="Age" />
                <BreezeInput v-model="form.age" id="age" type="number" max="110" min="0" class="mt-1 block w-full" placeholder="Select a number between 0 and 110" />
                </div>

                <div>
                <BreezeLabel for="pronoun" value="Pronoun" />
                <BreezeInput v-model="form.pronoun" id="pronoun" type="text" class="mt-1 block w-full"  placeholder="ex: they/them" required autofocus />
                </div>

                <div>
                <BreezeLabel for="motive" value="Main issue" />
                <BreezeInput v-model="form.motive" id="motive" type="text" class="mt-1 block w-full" placeholder="ex: Emotional dependency" required autofocus />
                </div>

                   <div>
                <BreezeLabel for="history" value="History" />
                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" max="8000" v-model="form.history" ref="input" id="history" type="textarea" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4 space-x-3">
                <BreezeButton class="bg-green-400 text-white hover:bg-green-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
                </BreezeButton>
                <BreezeButton class="bg-red-400 text-white hover:bg-red-500 "><a :href="route('patients_show', `${this.$page.props.patient.id}`)" method="get">Cancel</a></BreezeButton>
                </div>
       
            </div>
            </div>
            </form>
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
import BreezeLabel from '@/Components/Label.vue'
import BreezeInput from '@/Components/Input.vue';

export default {
    
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput   
    },

    
   
    data() {
        return {
            form: {
                
                name: this.$page.props.patient.name,
                email: this.$page.props.patient.email,
                age: this.$page.props.patient.age,
                pronoun: this.$page.props.patient.pronoun,
                motive: this.$page.props.patient.motive,
                history: this.$page.props.patient.history,
         
            }
        }
    },

    methods: {
        editPatient() {
            let data = {

            name: this.form.name,
            email: this.form.email,
            age: this.form.age,
            pronoun: this.form.pronoun,
            motive: this.form.motive,
            history: this.form.history,}
  
           
            this.$inertia.patch(`/patients/${this.$page.props.patient.id}/update`, data)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>

