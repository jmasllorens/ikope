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
                <form @submit.prevent="editSession()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
                 <div>
                <BreezeLabel for="date" value="Date and Time" />
                <BreezeInput v-model="form.date" id="date" type="datetime-local" class="mt-1 block w-full" required autofocus />
                </div>

                  <div>
                <BreezeLabel for="keywords" value="Keywords" />
                <BreezeInput v-model="form.keywords" id="keywords" type="text" class="mt-1 block w-full"  max="100" required autofocus />
                </div>

                <div>
                <BreezeLabel for="cost" value="Rate" />
                <BreezeInput v-model="form.cost" id="cost" type="number" max="100" min="20" class="mt-1 block w-full" />
                </div>

                 <div v-if="!$page.props.session.isPayed" class="mt-6 mb-2">
                <label class="flex items-center" for="isPayed">
                <BreezeCheckbox name="isPayed" v-model="form.isPayed" value=1 />
                <span class="ml-2 text-sm text-gray-600">Session payed</span>
                </label>
                </div>

                <div v-if="$page.props.session.isPayed" class="mt-6 mb-2">
                <label class="flex items-center" for="isPayed">
                <BreezeCheckbox name="isPayed" v-model="form.isPayed" true-value=0 false-value=1 />
                <span class="ml-2 text-sm text-gray-600">Payment pending</span>
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
                
                date: this.$page.props.session.date,
                keywords: this.$page.props.session.keywords,
                cost: this.$page.props.session.cost,
                isPayed: this.$page.props.session.isPayed
         
            }
        }
    },

    methods: {
        editSession() {
            let data = {

            date: this.form.date,
            keywords: this.form.keywords,
            cost: this.form.cost,
            isPayed: this.form.isPayed
           }
  
           
            this.$inertia.patch(`/patients/${this.$page.props.patient.id}/sessions/${this.$page.props.session.id}/update`, data)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>

