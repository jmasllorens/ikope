<template>
<Head title="Create" />

  <BreezeAuthenticatedLayout>
   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-blueish border-b border-gray-200">
                    <h2> Create </h2>
                </div>
            </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="createPatient()">
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
                <BreezeButton class="bg-red-400 text-white hover:bg-red-500 "><a :href="route('patients')" method="get">Cancel</a></BreezeButton>
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

    props: ['auth'],

     data() {
        return {
            form: this.$inertia.form({
                
                name: '',
                age: '',
                pronoun: '',
                motive: '',
                history: '',
                email: '',



            })
        }
    },

    methods: {
        createPatient() {
            let data = new FormData

            data.append('name', this.form.name)
            data.append('email', this.form.email)
            data.append('age', this.form.age)
            data.append('pronoun', this.form.pronoun)
            data.append('motive', this.form.motive)
            data.append('history', this.form.history)
  
           
            
            this.$inertia.post('/patients/store', data)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>