<template>
<Head title="Create" />

  <BreezeAuthenticatedLayout>
   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-blueish border-b border-gray-200">
                    <h2> <strong>{{$page.props.patient.name}}</strong>'s Session Number:&nbsp;{{$page.props.patient.sessions.length}}  </h2>
                </div>
            </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="createNote()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
            
                  <div>
                <BreezeLabel for="title" value="Title" />
                <BreezeInput v-model="form.title" id="title" type="text" class="mt-1 block w-full"  max="100" placeholder="ex: Emotionally unstable, unable to accept their own failure" required autofocus />
                </div>

                 <div>
                <BreezeLabel for="text" value="Note" />
                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" max="10000" v-model="form.text" ref="input" id="text" type="textarea" required autofocus />
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
                title: '',
                text: ''
               
            
            })
        }
    },

    methods: {
        createNote() {
            let data = new FormData

            data.append('title', this.form.title)
            data.append('text', this.form.text)
            
            this.$inertia.post(`/patients/${this.$page.props.patient.id}/sessions/${this.$page.props.session.id}/store`, data, `${this.$page.props.patient.id}`, `${this.$page.props.session.id}`)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
