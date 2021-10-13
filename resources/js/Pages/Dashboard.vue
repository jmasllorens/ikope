<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>

       <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        <strong>{{$props.auth.user.name}}</strong>, you're logged in!
                    </div>
                </div>
            </div>
            <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full text-center pb-8">
           
        
            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900 pb-2">
                I-KOPE
            </h1>
            <br>

            <p class="text-gray-500 font-normal text-base">Let's Help Each Other Cope</p>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg p-6">
                <div class="flex items-center space-x-6 mb-4">
                   <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">{{seminars.length}} Seminars</p>
                        <p class="text-base text-blue-500 font-normal">Continuous learning</p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-500 leading-loose font-normal text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div v-if="$props.auth.user.isAdmin" class="bg-white rounded-lg p-6">
                <div class="flex items-center space-x-6 mb-4">
                    <div class="p-3 rounded-full bg-white bg-opacity-75">
                                        <svg class="h-8 w-8 text-black" viewBox="0 0 28 30" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">{{users.length}} Users</p>
                          <p class="text-base text-blue-500 font-normal">I-KOPE Management</p>
                    </div>
                   


               
                </div>
                <div>
                    <p class="text-gray-500 leading-loose font-normal text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg p-6">
                <div class="flex items-center space-x-6 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">{{publications.length}} Publications </p>
                        <p class="text-base text-blue-500 font-normal">Keep up to date</p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-500 leading-loose font-normal text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div v-if="!$props.auth.user.isAdmin" class="bg-white rounded-lg p-6">
                <div class="flex items-center space-x-6 mb-4">
                   <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                    <div>
                        <p v-if="$page.props.auth.user.isActive" class="text-xl text-gray-700 font-normal mb-1">{{patients.length}} Patients </p>
                        <p v-if="!$page.props.auth.user.isActive" class="text-xl text-gray-700 font-normal mb-1"> Patients </p>
                        <p v-if="$page.props.auth.user.isActive" class="text-base text-blue-500 font-normal"> {{sessions.length}} Sessions & {{notes.length}} Notes </p>
                        <p v-if="!$page.props.auth.user.isActive" class="text-base text-blue-500 font-normal"> Sessions & Notes </p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-500 leading-loose font-normal text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        
            <div v-if="!$props.auth.user.isAdmin" class="bg-white rounded-lg p-6">
                <div class="flex items-center space-x-6 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path></svg>
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">Contact</p>
                        <p class="text-base text-blue-500 font-normal">Get in touch</p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-500 leading-loose font-normal text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    props: ['auth', 'users', 'seminars', 'patients', 'publications', 'sessions', 'notes'],

    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
