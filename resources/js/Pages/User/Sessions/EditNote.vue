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
                <form @submit.prevent="editNote()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              

                  <div>
                <BreezeLabel for="title" value="Title" />
                <BreezeInput v-model="form.title" id="title" type="text" class="mt-1 block w-full"  max="100" required autofocus />
                </div>

                <div>
                <BreezeLabel for="text" value="Notes" />
                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" max="10000" v-model="form.text" ref="input" id="tet" type="textarea" required autofocus />
                </div>

                 <div v-if="!$page.props.note.isImportant" class="mt-6 mb-2">
                <label class="flex items-center" for="isImportant">
                <BreezeCheckbox name="isImportant" v-model="form.isImportant" value=1 />
                <span class="ml-2 text-sm text-gray-600">Important</span>
                </label>
                </div>

                <div v-if="$page.props.note.isImportant" class="mt-6 mb-2">
                <label class="flex items-center" for="isImportant">
                <BreezeCheckbox name="isImportant" v-model="form.isImportant" true-value=0 false-value=1 />
                <span class="ml-2 text-sm text-gray-600">Unimportant</span>
                </label>
                </div>




                <div class="flex items-center justify-end mt-4 space-x-3">
                <BreezeButton class="bg-green-400 text-white hover:bg-green-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
                </BreezeButton>
                <BreezeButton class="bg-red-400 text-white hover:bg-red-500 "><a :href="`/patients/${this.$page.props.patient.id}/sessions/${this.$page.props.session.id}`" method="get">Cancel</a></BreezeButton>
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
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeInput from '@/Components/Input.vue';

export default {
    
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeCheckbox,
        BreezeInput   
    },

    
   
    data() {
        return {
            form: {
                
                title: this.$page.props.note.title,
                text: this.$page.props.note.text,
                isImportant: this.$page.props.note.isImportant
      
         
            }
        }
    },

    methods: {
        editNote() {
            let data = {

            title: this.form.title,
            text: this.form.text,
            isImportant: this.form.isImportant
           }
  
           
            this.$inertia.patch(`/patients/${this.$page.props.patient.id}/sessions/${this.$page.props.session.id}/${this.$page.props.note.id}/update`, data)
        }
    }
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>

