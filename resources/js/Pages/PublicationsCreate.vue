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
                <form @submit.prevent="createPublication()">
                <div class="grid grid-cols-2 gap-6">
                <div class="grid grid-rows-2 gap-6">
                              
                <div>
                <BreezeLabel for="title" value="Title"/>
                <BreezeInput v-model="form.title" id="title" type="text" class="mt-1 block w-full" placeholder="ex: 'Psychoanalysis in Considering Christian Metz's'" max="100" required autofocus />
                </div>

                <div>
                <BreezeLabel for="author" value="Author" />
                <BreezeInput v-model="form.author" id="author" type="text" class="mt-1 block w-full" placeholder="ex: Celia Britton" max="100" required autofocus />
                </div>


                 <div>
                <BreezeLabel for="image" value="URL Image" />
                <BreezeInput v-model="form.image" id="image" type="url" class="mt-1 block w-full" placeholder="Enter the URL image for the publication" max="200" required autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4 space-x-3">
                <BreezeButton class="bg-green-400 text-white hover:bg-green-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
                </BreezeButton>
                <BreezeButton class="bg-red-400 text-white hover:bg-red-500 "><a :href="route('publications')" method="get">Cancel</a></BreezeButton>
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
                
                title: '',
                author: '',
                image: ''

            })
        }
    },

    methods: {
        createPublication() {
            let data = new FormData

            data.append('title', this.form.title)
            data.append('author', this.form.author)
             data.append('image', this.form.image)
            
            this.$inertia.post('/publications/store', data)
        }
    }
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>