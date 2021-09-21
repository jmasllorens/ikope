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
    <BreezeValidationErrors class="mb-4" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="submit">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
                <div>
                <BreezeLabel for="title" value="Title" />
                <BreezeInput id="title" type="text" class="mt-1 block w-full" required autofocus />
                </div>

                <div>
                <BreezeLabel for="subject" value="Subject" />
                <BreezeInput id="subject" type="text" class="mt-1 block w-full" required autofocus />
                </div>

                <div>
                <BreezeLabel for="author" value="Author/s" />
                <BreezeInput id="author" type="text" class="mt-1 block w-full" required autofocus />
                </div>

                <div>
                <BreezeLabel for="approach" value="Approach" />
                <BreezeInput id="approach" type="text" class="mt-1 block w-full" required autofocus />
                </div>

                   <div>
                <BreezeLabel for="description" value="Abstract" />
                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" max="1000" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input" id="description" type="textarea" required autofocus />
                </div>

                <div>
                <BreezeLabel for="date" value="Date" />
                <BreezeInput id="date" type="datetime-local" class="mt-1 block w-full" required autofocus />
                </div>

                <div>
                <BreezeLabel for="availability" value="Available Places" />
                <BreezeInput id="availability" type="number" max="50" min="10" class="mt-1 block w-full" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4 space-x-3">
                <BreezeButton class="bg-green-400 text-white hover:bg-green-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Submit
                </BreezeButton>
                <BreezeButton class="bg-red-400 text-white hover:bg-red-500 "><a :href="route('seminars')" method="get">Cancel</a></BreezeButton>
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
                token: this.token,
                email: this.email,
                password: '',
                password_confirmation: '',
            })
        }
    },
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>