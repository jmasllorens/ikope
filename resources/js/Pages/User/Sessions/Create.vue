<template>
<Head title="Create" />

  <BreezeAuthenticatedLayout>
   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-blueish border-b border-gray-200">
                    <h2> <strong>{{$page.props.patient.name}}</strong>'s Session Number:&nbsp;{{$page.props.patient.sessions.length + 1}}  </h2>
                </div>
            </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="createSession()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
               
                <div>
                <BreezeLabel for="date" value="Date and Time" />
                <BreezeInput v-model="form.date" id="date" type="datetime-local" class="mt-1 block w-full" required autofocus />
                </div>

                  <div>
                <BreezeLabel for="keywords" value="Keywords" />
                <BreezeInput v-model="form.keywords" id="keywords" type="text" class="mt-1 block w-full"  max="100" placeholder="ex: anxiety, fear, vertigo" required autofocus />
                </div>

                <div>
                <BreezeLabel for="cost" value="Rate" />
                <BreezeInput v-model="form.cost" id="cost" type="number" max="100" min="20" class="mt-1 block w-full" placeholder="Select a rate for the session" />
                </div>

                <div class="flex items-center justify-end mt-4 space-x-3">
                <BreezeButton class="bg-green-400 text-white hover:bg-green-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
                </BreezeButton>
                <BreezeButton class="bg-red-400 text-white hover:bg-red-500 "><a :href="`/patients/${$page.props.patient.id}`" method="get">Cancel</a></BreezeButton>
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
            form: this.$inertia.form({
                date: '',
                cost: '',
                keywords: ''
            
            })
        }
    },

    methods: {
        createSession() {
            let data = new FormData

            data.append('date', this.form.date)
            data.append('keywords', this.form.keywords)
            data.append('cost', this.form.cost)
            
            this.$inertia.post(`/patients/${this.$page.props.patient.id}/sessions&notes/store`, data, `${this.$page.props.patient.id}`)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>