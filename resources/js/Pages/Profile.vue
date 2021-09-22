<template>
    <Head title="Profile" />
    <BreezeAuthenticatedLayout> 

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-blueish border-b border-gray-200">
                    <h2> Profile Settings </h2>
                </div>
            </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="updateProfile()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
                 <div>
                <BreezeLabel for="name" value="Name" />
                <BreezeInput id="email" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                </div>
                <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus />
                </div>

                 <div>
                <BreezeLabel for="pronoun" value="Pronoun" />
                <BreezeInput id="pronoun" type="text" class="mt-1 block w-full" v-model="form.pronoun" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                <BreezeButton class="bg-green-500 text-white hover:bg-green-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
                </BreezeButton>
                <BreezeButton class="bg-red-500 text-white hover:bg-red-600 ml-3"><a :href="route('dashboard')" method="get">Cancel</a></BreezeButton>
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

import { Head } from '@inertiajs/inertia-vue3'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import ResetPassword from '../Pages/Auth/ResetPassword.vue'
import BreezeButton from '@/Components/Button.vue'
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';


export default {

    props: ['user'],    
 
    components: {
      
        Head,
        ResetPassword,
        BreezeAuthenticatedLayout,
        BreezeInput,
        BreezeLabel,
        BreezeButton
    },


    data() {
        return {
            form: {
                name: this.user.name,
                email: this.user.email,
                pronoun: this.user.pronoun
        }
    }
    },

    methods: {
        updateProfile() {
              let data = 
              {
                name: this.form.name,
                email: this.form.email,
                pronoun: this.form.pronoun
                }
                this.$inertia.patch(`/profile/${this.user.id}/update`, data);
        }
    }
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>