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
                <form @submit.prevent="createSeminar()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
                <div>
                <BreezeLabel for="title" value="Title"/>
                <BreezeInput v-model="form.title" id="title" type="text" class="mt-1 block w-full" placeholder="ex: 'Understanding Death Wish'" required autofocus />
                </div>

                <div>
                <BreezeLabel for="subject" value="Subject" />
                <BreezeInput v-model="form.subject" id="subject" type="text" class="mt-1 block w-full"  placeholder="ex: sexuality" required autofocus />
                </div>

                <div>
                <BreezeLabel for="author" value="Author/s" />
                <BreezeInput v-model="form.author" id="author" type="text" class="mt-1 block w-full" placeholder="ex: Jacques Lacan" required autofocus />
                </div>

                <div>
                <BreezeLabel for="approach" value="Approach" />
                <BreezeInput v-model="form.approach" id="approach" type="text" class="mt-1 block w-full" placeholder="ex: psychoanalytic" required autofocus />
                </div>

                   <div>
                <BreezeLabel for="description" value="Abstract" />
                <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" max="1000" v-model="form.description" ref="input" id="description" type="textarea" required autofocus />
                </div>

                <div>
                <BreezeLabel for="date" value="Date" />
                <BreezeInput v-model="form.date" id="date" type="datetime-local" class="mt-1 block w-full" required autofocus />
                </div>

                <div>
                <BreezeLabel for="availability" value="Available Places" />
                <BreezeInput v-model="form.availability" id="availability" type="number" max="50" min="10" class="mt-1 block w-full" placeholder="Select a number between 10 and 50" />
                </div>

                <div class="flex items-center justify-end mt-4 space-x-3">
                <BreezeButton class="bg-green-400 text-white hover:bg-green-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
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
                title: '',
                subject: '',
                author: '',
                approach: '',
                description: '',
                date: '',
                availability: '',
            })
        }
    },

    methods: {
        createSeminar() {
            let data = new FormData

            data.append('title', this.form.title)
            data.append('subject', this.form.subject)
            data.append('author', this.form.author)
            data.append('approach', this.form.approach)
            data.append('description', this.form.description)
            data.append('date', this.form.date)
            data.append('availability', this.form.availability)
            
            this.$inertia.post('/seminars/store', data)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>